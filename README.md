## Technical Challenge
This task is intended to test your ability to consume a webpage, process some data and present it.
While there is no specific time limit, we would not expect you to spend any longer than 2 hours
completing this.
We are looking for concise, testable, clean, well commented code and that you have chosen the
right tools for the right job. We will also be looking at your app structure as a whole.
Requirements
Using best practice coding methods, build a console application that scrapes the following website
url https://wltest.dns-systems.net/ and returns a JSON array of all the product options on the page.
Each element in the JSON results array should contain ‘option title, ‘description’, ‘price’ and
‘discount’ keys corresponding to items in the table. The items should be ordered by annual price
with the most expensive package first.
# 

## Requirements


##### Install Requirements

* GNU make https://www.gnu.org/software/make/
* Docker https://docs.docker.com/engine/installation/
* Docker compose https://docs.docker.com/compose/install/

Please install dependencies then start containers before you scrape or run tests 


##### Install Dependencies

```$xslt
    make install
```

##### Start Containers
```$xslt
    make sail-start
```

##### Web Scrape

```$xslt
    make web-scrape
```
##### Run Tests

```$xslt
    make test-phpunit 
 ```


