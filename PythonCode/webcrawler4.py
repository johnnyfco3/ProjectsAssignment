import scrapy


class BrickSetSpider(scrapy.Spider):
    name = 'brick_spider'
    start_urls = ["https://en.wikipedia.org/wiki/Tom_Cruise"]

    def parse(self, response):
        SET_SELECTOR = '.mw-parser-output'
        for brickset in response.css(SET_SELECTOR):

            NAME_SELECTOR = 'p ::text'
            yield {
                'name': brickset.css(NAME_SELECTOR).extract_first(),
            }