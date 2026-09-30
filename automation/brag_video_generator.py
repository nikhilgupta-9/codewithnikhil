#!/usr/bin/env python3
"""
NikhilWorks Brag Video Generator
================================
Inspired by https://github.com/latent-spaces/brag and Hyperframes.
Generates video scripts, HTML render frames, and automated social videos
for project launches, client testimonials, and technical deep-dives.

Outputs:
1. YouTube Shorts / Instagram Reels (1080x1920)
2. LinkedIn / YouTube Landscape (1920x1080)
"""

import os
import sys
import json
import subprocess

TEMPLATE_PATH = os.path.join(os.path.dirname(__file__), "hyperframes_template.html")
OUTPUT_DIR = os.path.join(os.path.dirname(__file__), "output_videos")

def generate_video_config(project_name, client_quote, rating="5.0★", metric_1="100%", metric_1_label="Uptime", metric_2="10x", metric_2_label="Leads"):
    return {
        "badge": f"NikhilWorks • Client Spotlight",
        "headline": f"{project_name} — High Performance Launch",
        "tagline": f'"{client_quote}"',
        "m1": {"val": metric_1, "lab": metric_1_label},
        "m2": {"val": metric_2, "lab": metric_2_label},
        "m3": {"val": rating, "lab": "Client Review"}
    }

def render_html_frame(config, output_html_path):
    with open(TEMPLATE_PATH, "r", encoding="utf-8") as f:
        template = f.read()

    template = template.replace('id="badgeText">NikhilWorks • Project Launch', f'id="badgeText">{config["badge"]}')
    template = template.replace('id="headlineText">High-Performance Web Apps & SEO That Drive Real Revenue', f'id="headlineText">{config["headline"]}')
    template = template.replace('id="taglineText">Custom PHP, Modern Full-Stack Development & Strategic Search Optimization for global brands across USA, UK, UAE & India.', f'id="taglineText">{config["tagline"]}')
    template = template.replace('id="m1Val">99/100', f'id="m1Val">{config["m1"]["val"]}')
    template = template.replace('id="m1Lab">PageSpeed Score', f'id="m1Lab">{config["m1"]["lab"]}')
    template = template.replace('id="m2Val">#1 Rank', f'id="m2Val">{config["m2"]["val"]}')
    template = template.replace('id="m2Lab">Target Keywords', f'id="m2Lab">{config["m2"]["lab"]}')
    template = template.replace('id="m3Val">4.9★', f'id="m3Val">{config["m3"]["val"]}')
    template = template.replace('id="m3Lab">Client Satisfaction', f'id="m3Lab">{config["m3"]["lab"]}')

    with open(output_html_path, "w", encoding="utf-8") as f:
        f.write(template)
    print(f"[Brag] Generated frame at: {output_html_path}")

def main():
    os.makedirs(OUTPUT_DIR, exist_ok=True)
    print("==================================================")
    print("      NikhilWorks Brag Video & Asset Generator     ")
    print("==================================================")

    # Example: Generate a showcase for Healthcare & Real Estate projects
    conf = generate_video_config(
        project_name="Healthcare Clinic Pro",
        client_quote="Nikhil transformed our web presence. Patient bookings increased by 240% within 60 days.",
        rating="5.0★",
        metric_1="0.4s",
        metric_1_label="Load Time",
        metric_2="+240%",
        metric_2_label="Online Bookings"
    )

    out_frame = os.path.join(OUTPUT_DIR, "healthcare_launch.html")
    render_html_frame(conf, out_frame)
    print("\nTo render into MP4 using ffmpeg/browser:")
    print(f"Open: file://{out_frame}")
    print("Ready for automated video creation via Hyperframes or Screen recording.")

if __name__ == "__main__":
    main()
