package main

import (
	"fmt"
	"strings"
	"net/http"
	"io/ioutil"
)

func main() {

	url := "https://staging.airshot.io/api/v1/performance/upload/"

	payload := strings.NewReader("{\"broadcast_ID\": 45, \"kpiIndicator\": \"Sales\",\"name\": \"API Upload\",\"data\": \"[[\\\"Date\\\",\\\"E-mail\\\",\\\"Sales\\\"],[\\\"2019-03-01\\\",\\\"johndoe@5-mail.info\\\",10000],[\\\"2019-03-01\\\",\\\"janedoe@5-mail.info\\\",5000],[\\\"2019-03-02\\\",\\\"janedoe@5-mail.info\\\",7500],[\\\"2019-03-02\\\",\\\"johndoe@5-mail.info\\\",9000],[\\\"2019-03-03\\\",\\\"janedoe@5-mail.info\\\",500],[\\\"2019-03-03\\\",\\\"johndoe@5-mail.info\\\",7500],[\\\"2019-03-04\\\",\\\"janedoe@5-mail.info\\\",8000],[\\\"2019-03-04\\\",\\\"johndoe@5-mail.info\\\",1500]]\"}")

	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("Content-Type", "application/json")
	req.Header.Add("Authorization", "Basic QVAzMy1GR1BWLTYzT04tNTk3MzoxZGU1ODBlMmY2ZjcxOTk2OWY3ZjA3NTI0ZDcyYzI5Ny40OTM5NDE4NjY0ZWRhYjg0ZDVkMTNmZDNhYTM5ODQ5Yg==")
	req.Header.Add("cache-control", "no-cache")
	req.Header.Add("Postman-Token", "0f234ce5-02f1-49fe-b678-d7f370963cb3")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := ioutil.ReadAll(res.Body)

	fmt.Println(res)
	fmt.Println(string(body))

}