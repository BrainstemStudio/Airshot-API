import http.client

conn = http.client.HTTPConnection("staging,airshot,io")

payload = ""

headers = {
    'Content-Type': "application/json; charset=utf-8",
    'Authorization': "Basic QVAzMy1GR1BWLTYzT04tNTk3MzoxZGU1ODBlMmY2ZjcxOTk2OWY3ZjA3NTI0ZDcyYzI5Ny40OTM5NDE4NjY0ZWRhYjg0ZDVkMTNmZDNhYTM5ODQ5Yg==",
    'cache-control': "no-cache",
    }

conn.request("GET", "api,v1,broadcasts,list", payload, headers)

res = conn.getresponse()
data = res.read()

print(data.decode("utf-8"))