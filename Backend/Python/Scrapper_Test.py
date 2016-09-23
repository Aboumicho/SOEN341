import requests
from bs4 import BeautifulSoup

# loads the web page into a variable
firstScrape = requests.get("https://aits.encs.concordia.ca/oldsite/resources/schedules/courses/?y=2016&s=2#CES")
# print(r.content)


soup = BeautifulSoup(firstScrape.content, "html.parser")
#print(soup.prettify())

rawData = (soup.find_all("tr")[1:])

for item in rawData:
    print(item.contents[1].text)
    print(item.contents[3].text)

    firstLinkCheck = 0

    #Use this to get the rest of the data from the title link
    for a in item.find_all('a', href=True):
        if firstLinkCheck > 0:
            break
        newLink = "https://aits.encs.concordia.ca/oldsite/resources/schedules/courses/" + a['href']
       # print("The New Link is " + newLink + "\n")

        #Todo: Scrape Again Here!
        secondScrape = requests.get(newLink)
        soup2 = BeautifulSoup(secondScrape.content, "html.parser")

        try:
            for row in soup2.findAll('table')[1].tbody.findAll('tr'):
                first_column = row.findAll('td')

                classType = row.contents[1].text
                classDay = row.contents[9].text
                startTime = row.contents[11].text
                endTime = row.contents[13].text
                print("class Type: " + classType + "\nclass Day: " + classDay)
                print("Start Time: "
                      + startTime + " End Time: " + endTime)
        except:
            for row in soup2.findAll('table')[0].tbody.findAll('tr'):
                first_column = row.findAll('td')
                print(row.contents[11].text)
                classType = row.contents[1].text
                classDay = row.contents[9].text
                startTime = row.contents[11].text
                endTime = row.contents[13].text
                print("Class Type: " + classType + "Class Day: " + classDay)
                print("Start Time: " + startTime + "End Time: " + endTime)

        # try:
        #     for row in soup2.findAll('table')[1].tbody.findAll('tr'):
        #         first_column = row.findAll('td')[4].contents
        #         print(first_column)
        # except:
        #     for row in soup2.findAll('table')[0].tbody.findAll('tr'):
        #         first_column = row.findAll('td')[4].contents
        #         print(first_column)



        firstLinkCheck += 1







# ---------Test Code
    #print("<a href='%s'>%s</a>" % (item.get("href"), item.text))
    # print(item['href'])
    #print(item.contents[1])
    #print(item.contents[1].text)
    #print(item.contents[3].text + "\n\n")
    #Add something here to scrape the link from contents[1]
# ---------End of Test Code

