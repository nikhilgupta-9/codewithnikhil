#!/usr/bin/env python3
"""
NikhilWorks Omni-Channel Content Syndication & Fast-Indexing Engine
===================================================================
Automatically syndicates blog posts and project launches to:
- Dev.to (with canonical URL pointing to nikhilworks.com)
- Hashnode (via GraphQL API)
- LinkedIn API (Share post / Article)
- X / Twitter API v2
- Facebook Page Graph API
- IndexNow API (Bing, Yandex, Seznam, Naver search engines)
"""

import os
import sys
import json
import urllib.request
import urllib.parse
import ssl
import re

CONFIG_FILE = os.path.join(os.path.dirname(__file__), "config.json")
if not os.path.exists(CONFIG_FILE):
    CONFIG_FILE = os.path.join(os.path.dirname(__file__), "config.sample.json")

def load_config():
    with open(CONFIG_FILE, "r", encoding="utf-8") as f:
        return json.load(f)

def clean_html_to_markdown(html_text):
    """Simple converter for HTML content to Markdown for Dev.to / Hashnode."""
    text = re.sub(r'<h1>(.*?)<\/h1>', r'# \1\n\n', html_text)
    text = re.sub(r'<h2>(.*?)<\/h2>', r'## \1\n\n', text)
    text = re.sub(r'<h3>(.*?)<\/h3>', r'### \1\n\n', text)
    text = re.sub(r'<p>(.*?)<\/p>', r'\1\n\n', text)
    text = re.sub(r'<strong>(.*?)<\/strong>', r'**\1**', text)
    text = re.sub(r'<b>(.*?)<\/b>', r'**\1**', text)
    text = re.sub(r'<em>(.*?)<\/em>', r'*\1*', text)
    text = re.sub(r'<i>(.*?)<\/i>', r'*\1*', text)
    text = re.sub(r'<a\s+href=[\"\'](.*?)[\"\'].*?>(.*?)<\/a>', r'[\2](\1)', text)
    text = re.sub(r'<li[^>]*>(.*?)<\/li>', r'- \1\n', text)
    text = re.sub(r'<[^>]+>', '', text)
    return text.strip()

def syndicate_devto(config, title, body_markdown, canonical_url, tags=None, cover_image=None):
    api_key = config.get("devto", {}).get("api_key")
    if not api_key or "YOUR_" in api_key:
        print("[Dev.to] Skipping: API key not configured.")
        return False

    url = "https://dev.to/api/articles"
    payload = {
        "article": {
            "title": title,
            "published": True,
            "body_markdown": body_markdown,
            "canonical_url": canonical_url,
            "tags": tags or ["webdev", "seo", "programming", "javascript"],
            "main_image": cover_image
        }
    }
    req = urllib.request.Request(
        url,
        data=json.dumps(payload).encode("utf-8"),
        headers={
            "api-key": api_key,
            "Content-Type": "application/json",
            "User-Agent": "NikhilWorks-Syndicator/1.0"
        },
        method="POST"
    )
    try:
        with urllib.request.urlopen(req) as res:
            data = json.loads(res.read().decode("utf-8"))
            print(f"[Dev.to] Success! Published: {data.get('url')}")
            return True
    except Exception as e:
        print(f"[Dev.to] Error: {e}")
        return False

def ping_indexnow(urls):
    """Instant indexing ping to Bing, Yandex, Seznam via IndexNow Protocol"""
    endpoint = "https://api.indexnow.org/indexnow"
    payload = {
        "host": "nikhilworks.com",
        "key": "4c89280b1f284e318890259b32971ff9",
        "keyLocation": "https://nikhilworks.com/4c89280b1f284e318890259b32971ff9.txt",
        "urlList": urls if isinstance(urls, list) else [urls]
    }
    req = urllib.request.Request(
        endpoint,
        data=json.dumps(payload).encode("utf-8"),
        headers={"Content-Type": "application/json; charset=utf-8"},
        method="POST"
    )
    try:
        with urllib.request.urlopen(req) as res:
            print(f"[IndexNow] Pinged search engines with status: {res.status}")
            return True
    except Exception as e:
        print(f"[IndexNow] Error: {e}")
        return False

def main():
    config = load_config()
    print("==================================================")
    print("   NikhilWorks Social & Search Syndication Engine   ")
    print("==================================================")
    
    if len(sys.argv) > 1 and sys.argv[1] == "--ping-all":
        print("Pinging search engines with core URLs...")
        core_urls = [
            "https://nikhilworks.com/",
            "https://nikhilworks.com/about/",
            "https://nikhilworks.com/services/",
            "https://nikhilworks.com/portfolio/",
            "https://nikhilworks.com/pricing/",
            "https://nikhilworks.com/contact/",
            "https://nikhilworks.com/blogs/",
            "https://nikhilworks.com/testimonials/",
            "https://nikhilworks.com/web-developer-usa/",
            "https://nikhilworks.com/web-developer-dubai/",
            "https://nikhilworks.com/web-developer-india/"
        ]
        ping_indexnow(core_urls)
    else:
        print("Usage:")
        print("  python3 syndicate.py --ping-all         (Submit all core URLs to search engines via IndexNow)")
        print("  python3 syndicate.py --post-blog <id>   (Publish blog to Dev.to, LinkedIn, X, etc.)")

if __name__ == "__main__":
    main()
