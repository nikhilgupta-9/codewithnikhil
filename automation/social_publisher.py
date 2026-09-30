#!/usr/bin/env python3
"""
NikhilWorks - Automated Social Media Workflow Engine
Reads project updates, git commits, blog posts, and services to generate & dispatch
multi-platform social media posts across Twitter/X, LinkedIn, Instagram, and WhatsApp.
"""

import os
import sys
import json
import subprocess
import argparse
from datetime import datetime
import urllib.request
import urllib.error

BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
QUEUE_DIR = os.path.join(os.path.dirname(os.path.abspath(__file__)), "queue")
os.makedirs(QUEUE_DIR, exist_ok=True)

PENDING_QUEUE_FILE = os.path.join(QUEUE_DIR, "pending_posts.json")
PUBLISHED_QUEUE_FILE = os.path.join(QUEUE_DIR, "published_posts.json")

def get_git_recent_commits(limit=3):
    """Retrieve recent clean git commits to form update highlights."""
    try:
        cmd = ["git", "log", f"-n", str(limit), "--pretty=format:%h|%s|%an|%ad", "--date=short"]
        result = subprocess.run(cmd, cwd=BASE_DIR, capture_output=True, text=True, check=True)
        commits = []
        for line in result.stdout.strip().split("\n"):
            if line:
                parts = line.split("|")
                if len(parts) >= 4:
                    commits.append({
                        "hash": parts[0],
                        "message": parts[1],
                        "author": parts[2],
                        "date": parts[3]
                    })
        return commits
    except Exception as e:
        return [{"hash": "head", "message": "General project architecture & UI updates", "author": "Nikhil", "date": str(datetime.now().date())}]

def generate_social_pack(topic="Feature Update", details=None):
    """Generate platform-specific post text for Twitter/X, LinkedIn, and Instagram."""
    if details is None:
        commits = get_git_recent_commits(3)
        commit_bullets = "\n".join([f"• {c['message']}" for c in commits])
        details = f"Recent platform enhancements:\n{commit_bullets}"

    timestamp = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

    # Twitter / X Format (Punchy, under 280 chars or 2-part thread)
    twitter_post = (
        f"🚀 Just deployed new updates to NikhilWorks!\n\n"
        f"⚡ 100/100 Google PageSpeed + AI workflow automations.\n"
        f"🛠️ Latest enhancements:\n"
        f"{details[:120]}...\n\n"
        f"Explore live: https://nikhilworks.com/\n"
        f"#WebDev #AI #BuildInPublic #Nextjs #Freelance"
    )

    # LinkedIn Format (B2B Story, Problem -> Solution -> Results)
    linkedin_post = (
        f"💡 Scaling client delivery without agency overheads.\n\n"
        f"Over the last week at NikhilWorks, we implemented key architectural and AI workflow upgrades:\n\n"
        f"{details}\n\n"
        f"🎯 Core Stack & Pillars:\n"
        f"1. Sub-second load times with clean semantic code.\n"
        f"2. Built-in AI chatbots (Gemini & OpenAI) for 24/7 lead capture.\n"
        f"3. Transparent fixed pricing starting at ₹7,999 ($99).\n\n"
        f"Building a web application or need to automate your workflows?\n"
        f"Let's connect: https://nikhilworks.com/contact/\n\n"
        f"#SoftwareEngineering #FullStack #WebDevelopment #AIAutomation #Startups #NikhilWorks"
    )

    # Instagram / Reel / Story Caption
    instagram_post = (
        f"Leveling up web development & AI automations 🚀⚡\n\n"
        f"Here is what just went live at NikhilWorks:\n"
        f"{details}\n\n"
        f"🔥 Need a high-converting website, eCommerce store, or custom AI bot for your business?\n"
        f"📲 Link in bio (@nikhilworks) or WhatsApp: +91 83685 52640\n\n"
        f".\n.\n"
        f"#webdeveloper #coding #ai #automation #n8n #javascript #delhi #startupindia #freelancer"
    )

    post_payload = {
        "id": f"post_{int(datetime.now().timestamp())}",
        "created_at": timestamp,
        "topic": topic,
        "platforms": {
            "twitter": twitter_post,
            "linkedin": linkedin_post,
            "instagram": instagram_post
        },
        "url": "https://nikhilworks.com/",
        "status": "pending"
    }

    return post_payload

def save_to_queue(post_payload):
    """Save generated post payload into pending queue."""
    pending = []
    if os.path.exists(PENDING_QUEUE_FILE):
        try:
            with open(PENDING_QUEUE_FILE, "r") as f:
                pending = json.load(f)
        except Exception:
            pending = []

    pending.insert(0, post_payload)
    with open(PENDING_QUEUE_FILE, "w") as f:
        json.dump(pending, f, indent=2)
    print(f"✅ Post [{post_payload['id']}] saved to queue ({PENDING_QUEUE_FILE}).")

def dispatch_webhook(post_payload, webhook_url):
    """Send post payload to n8n / Make / Buffer webhook."""
    data = json.dumps(post_payload).encode('utf-8')
    req = urllib.request.Request(
        webhook_url,
        data=data,
        headers={"Content-Type": "application/json", "User-Agent": "NikhilWorks-SocialSync/1.0"}
    )
    try:
        with urllib.request.urlopen(req, timeout=10) as response:
            res_body = response.read().decode('utf-8')
            print(f"🚀 Successfully pushed post to webhook! Response: {res_body[:100]}")
            return True
    except urllib.error.URLError as e:
        print(f"❌ Failed to reach webhook: {e}")
        return False

def main():
    parser = argparse.ArgumentParser(description="NikhilWorks Social Media Automation Engine")
    parser.add_argument("--action", choices=["generate", "queue", "publish", "list"], default="generate")
    parser.add_argument("--topic", default="Project & AI Workflow Updates")
    parser.add_argument("--details", default=None)
    parser.add_argument("--webhook", default=None, help="Webhook URL for n8n or Make.com workflow")

    args = parser.parse_args()

    if args.action == "generate":
        pack = generate_social_pack(args.topic, args.details)
        print("\n" + "="*60)
        print(" Generated Multi-Platform Social Media Posts:")
        print("="*60)
        print("\n--- [1] X / Twitter ---")
        print(pack["platforms"]["twitter"])
        print("\n--- [2] LinkedIn ---")
        print(pack["platforms"]["linkedin"])
        print("\n--- [3] Instagram ---")
        print(pack["platforms"]["instagram"])
        print("="*60 + "\n")
        save_to_queue(pack)

    elif args.action == "queue":
        pack = generate_social_pack(args.topic, args.details)
        save_to_queue(pack)

    elif args.action == "publish":
        pack = generate_social_pack(args.topic, args.details)
        if args.webhook:
            dispatch_webhook(pack, args.webhook)
        else:
            print("ℹ️ No webhook specified. Use --webhook <url> to dispatch to n8n / Buffer.")
            save_to_queue(pack)

    elif args.action == "list":
        if os.path.exists(PENDING_QUEUE_FILE):
            with open(PENDING_QUEUE_FILE, "r") as f:
                pending = json.load(f)
            print(f"📋 Total pending queued posts: {len(pending)}")
            for p in pending[:5]:
                print(f"- [{p['id']}] {p['created_at']} | Topic: {p['topic']}")
        else:
            print("Queue is currently empty.")

if __name__ == "__main__":
    main()
