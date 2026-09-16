import sys
import json
import requests
import urllib3

urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)

def audit_target(url):
    if not url.startswith(("http://", "https://")):
        url = "https://" + url

    headers_to_check = [
        "Strict-Transport-Security",
        "Content-Security-Policy",
        "X-Frame-Options",
        "X-Content-Type-Options",
        "Referrer-Policy"
    ]

    report = {
        "target": url,
        "status": "Unknown",
        "score": 100,
        "missing_headers": [],
        "present_headers": {}
    }

    try:
        response = requests.get(url, timeout=5, verify=False)
        report["status"] = response.status_code

        for header in headers_to_check:
            if header in response.headers:
                report["present_headers"][header] = response.headers[header]
            else:
                report["missing_headers"].append(header)
                report["score"] -= 15

        report["score"] = max(0, report["score"])

    except Exception as e:
        report["error"] = str(e)
        report["score"] = 0

    return report

if __name__ == "__main__":
    target_url = sys.argv[1] if len(sys.argv) > 1 else "https://example.com"
    print(json.dumps(audit_target(target_url)))
