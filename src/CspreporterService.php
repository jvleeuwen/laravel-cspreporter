<?php

namespace Jvleeuwen\Cspreporter;

class CspreporterService
{
    protected $rssUri;
    protected $feed;

    public function test()
    {
        return 'u have reached the test function';
    }

    public function uri($rssUri)
    {
        try {
            $feed = simplexml_load_file($rssUri)->asXML();
            if ($feed) {
                $feed = $this->ParseRss(simplexml_load_string($feed));
            }
        } catch (\Exception $e) {
            return 'invalid XML';
        }

        return $feed;
    }

    public function file($filename)
    {
        $file = simplexml_load_file($filename)->asXML();
        $xml = simplexml_load_string($file);

        return $xml;
    }

    public function ParseRss($feed)
    {
        $feedArray = [];
        if (isset($feed->channel)) {
            /* channel props:
            $channelTitel = (string)$feed->channel->title;
            $channelDebug = (string)$feed->channel->debug;
            $channelLink = (string)$feed->channel->link;
            $channelDescription = (string)$feed->channel->description;
            $channelLanguage = (string)$feed->channel->language;
            $channelPubDate = (string)$feed->channel->pubDate;
            $channelLastBuildDate = (string)$feed->channel->lastBuildDate;
            $channelGenerator = (string)$feed->channel->generator;
            $channelManagingEditor = (string)$feed->channel->managingEditor;
            $channelWebMaster = (string)$feed->channel->webMaster;
            $channelTTL = (integer)$feed->channel->ttl;
            */
            foreach ($feed->channel->item as $item) {
                $rssItem = [
                    'id' 			=> (integer) $item->attributes()->id,
                    'title' 		=> (string) $item->title,
                    'description'	=> (string) $item->description,
                    'pubDate'		=> (string) $item->pubDate,
                    'startDate'		=> (string) $item->startDate,
                    'endDate'		=> (string) $item->endDate,
                    'category'		=> (string) $item->category,
                    'link'			=> (string) $item->link,
                ];
                array_push($feedArray, $rssItem);
            }
        }

        return $feedArray;
    }
}
