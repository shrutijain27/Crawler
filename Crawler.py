__author__ = 'shruti'

# Crawler to crawl flipkart site to retrieve laptops data
import scrapy
from scrapy.contrib.linkextractors import LinkExtractor
from scrapy.contrib.spiders import CrawlSpider, Rule
from scrapy.spider import BaseSpider
from scrapy.selector import Selector
from scrapy.http import Request
from tutorial.items import TutorialItem

import json
import string


class FlipkartSpider(CrawlSpider):
    name = "flipkart_spider"
    allow_domains = ["flipkart.com"]

    start_urls = ['http://www.flipkart.com/laptops/pr?sid=6bo,b5g']

    rules = [
    Rule(LinkExtractor(allow=r'laptops\/pr\?sid=6bo,b5g&start=[0-9]'),
         callback='parse_list', follow=True)
    ]

    def parse_list(self, response):
        hxs = Selector(response)
        titles = hxs.select(
            "//div[contains(@class,'product-unit unit-4 browse-product new-design')]")
        items = []
        count1 = 0
        for title in titles:
            count1 = count1 + 1
            item = TutorialItem()
            item['model'] = title.select(
                ".//div[contains(@class,'pu-title')]/a/text()").extract()

            if not item['model']: 
                item['model']=["n/a"]
                
            item['offer'] = title.select(
                ".//div[contains(@class,'pu-final')]/span/text()").extract()
            if not item['offer']: 
                item['offer']=["n/a"]
                    
            item['image'] = title.select(
                ".//div[contains(@class,'pu-visual-section')]/a/img/@data-src").extract()
            if not item['image']: 
                item['image']=["n/a"]
                    
            item['standard_url'] = "http://www.flipkart.com" + \
                title.select(
                    ".//div[contains(@class,'pu-title')]/a/@href")[0].extract()
            if not item['standard_url']:
                item['standard_url']=["n/a"]
                        
            
            request = Request(
                item['standard_url'], callback=self.new_features)
            request.meta['item'] = item
            items.append(item)
            yield request

    def new_features(self,response):
        item = response.meta["item"]
        hxs = Selector(response)
      
        rows = hxs.xpath("//div[contains(@class,'productSpecs')]/table/tr")
        item['included_software']=str(rows.xpath("td[.='Included Software']/following-sibling::td[1]/text()").extract())
        if item['included_software'] == "[]": 
            item['included_software']=["n/a"] 
        
        item['ram']=str(rows.xpath("td[.='System Memory']/following-sibling::td[1]/text()").extract())
        if not item['ram']: 
            item['ram']=["n/a"]
        
        item['Brand'] = str(rows.xpath("td[.='Brand']/following-sibling::td[1]/text()").extract())
        if not item['Brand']: 
            item['Brand']=["n/a"]
        
        item['PartNumber'] = str(rows.xpath("td[.='Part Number']/following-sibling::td[1]/text()").extract())
        if not item['PartNumber']: 
            item['PartNumber']=["n/a"]
        
        item['ModelId'] = str(rows.xpath("td[.='Model ID']/following-sibling::td[1]/text()").extract())
        if not item['ModelId']: 
            item['ModelId']=["n/a"]
        
        return item
  

