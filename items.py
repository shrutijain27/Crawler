# -*- coding: utf-8 -*-

# Define here the models for your scraped items
#
# See documentation in:
# http://doc.scrapy.org/en/latest/topics/items.html


import scrapy

class CrawlingItem(scrapy.Item):
    model=scrapy.Field()
    offer=scrapy.Field()
    image=scrapy.Field()
    standard_url=scrapy.Field()
    processor=scrapy.Field()
    ram=scrapy.Field()
    hdd=scrapy.Field()
    
   
