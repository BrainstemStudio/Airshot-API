package main

import (
	b64 "encoding/base64"
	"fmt"
	"io/ioutil"
	"net/http"
	"strings"
)

type AirshotConfig struct {
	ID   string
	key  string
	base string
}

type AirshotClient struct {
	api AirshotConfig
}

func CreateAirshotApi(config AirshotConfig) AirshotClient {

	instance := AirshotClient{
		api: config,
	}

	return instance
}

func (airshot AirshotClient) Process(endpoint string, method string, methodType string, payload *strings.Reader) string {

	url := airshot.api.base + endpoint + "/" + method
	authorisation := b64.StdEncoding.EncodeToString([]byte(airshot.api.ID + ":" + airshot.api.key))

	req, _ := http.NewRequest(strings.ToUpper(methodType), url, payload)

	req.Header.Add("Content-Type", "application/json")
	req.Header.Add("Authorization", "Basic "+authorisation)
	req.Header.Add("cache-control", "no-cache")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)

	return string(body)

}

func uploadExample(airshot AirshotClient) {

	payload := strings.NewReader("{\"broadcast_ID\": 45, \"kpiIndicator\": \"Sales\",\"name\": \"API Upload\",\"data\": [[\"Date\",\"Name\",\"E-mail\",\"Sales\",\"Location\"],[\"2019-03-01\",\"John Smith\",\"johnsmith@example.com\",10000,\"Cape Town, ZA\"]]\n}")

	response := airshot.Process("performance", "upload", "post", payload)

	fmt.Println(response)

}

func analyicsExample(airshot AirshotClient) {

	response := airshot.Process("analytics", "focus", "post", strings.NewReader("{\"broadcast_ID\" : 45}"))

	fmt.Println(response)

}

func broadcastListExample(airshot AirshotClient) {

	response := airshot.Process("broadcasts", "list", "get", strings.NewReader(""))

	fmt.Println(response)

}

func main() {

	airshot := CreateAirshotApi(AirshotConfig{
		ID:   "<API ACCOUNT ID>",
		key:  "<API ACCOUNT KEY>",
		base: "https://staging.airshot.io/api/v1/",
	})

	broadcastListExample(airshot)

}
