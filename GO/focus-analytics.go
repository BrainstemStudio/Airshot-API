package main

import (
	"fmt"
	"io/ioutil"
	"net/http"
	"strings"
)

func main() {

	url := "https://staging.airshot.io/api/v1/analytics/focus/"

	payload := strings.NewReader("{\"broadcast_ID\" : 45}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("Content-Type", "application/json")
	req.Header.Add("Authorization", "Basic QVAzMy1GR1BWLTYzT04tNTk3MzoxZGU1ODBlMmY2ZjcxOTk2OWY3ZjA3NTI0ZDcyYzI5Ny40OTM5NDE4NjY0ZWRhYjg0ZDVkMTNmZDNhYTM5ODQ5Yg==")
	req.Header.Add("cache-control", "no-cache")
	req.Header.Add("Postman-Token", "e07de1b3-d349-4235-a8b3-e32b982b67d9")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}
