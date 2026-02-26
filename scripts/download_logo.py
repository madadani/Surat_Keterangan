import urllib.request
import ssl

ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

# Trying the c/c5 URL hash
url = "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Seal_of_Sragen_Regency.svg/500px-Seal_of_Sragen_Regency.svg.png"
path = "c:/laragon/www/Surat_Keterangan/public/images/logo-sragen.png"
headers = {'User-Agent': 'Mozilla/5.0'}

try:
    print(f"Downloading from {url}...")
    req = urllib.request.Request(url, headers=headers)
    with urllib.request.urlopen(req, context=ctx) as response, open(path, 'wb') as out_file:
        out_file.write(response.read())
    print("Success: File downloaded.")
except Exception as e:
    print(f"Error: {e}")
