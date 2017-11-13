<?php

namespace Jvleeuwen\Cspreporter;

use Illuminate\Support\Facades\Log;

class Cspreporter
{
    protected $rssUri;
    protected $feed;

    public function uri($rssUri)
    {
        // Gets the RSS from the $rssUri
        try {
            $feed = simplexml_load_file($rssUri)->asXML();
            if ($feed) {
                return $this->ParseRss(simplexml_load_string($feed));
            }
        } catch (\Exception $e) {
            Log::warning($e);
            return 'invalid XML';
        }
    // @codeCoverageIgnoreStart
    }
    // @codeCoverageIgnoreEnd

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
                    // 'id' 			=> $item->attributes()->id,
                    'title' 		=> $item->title,
                    'description'	=> $item->description,
                    'pubDate'		=> $item->pubDate,
                    'startDate'		=> $item->startDate,
                    'endDate'		=> $item->endDate,
                    'category'		=> $item->category,
                    'link'			=> $item->link,
                ];
                array_push($feedArray, $rssItem);
            }
            return $feedArray;
        }
    // @codeCoverageIgnoreStart    
    }
    // @codeCoverageIgnoreEnd
}
