# Wistia

> Upload and embed Wistia videos straight from an entry field.  Either drag and drop to upload a new video, or copy-paste the url to the video you wish to embed. 

## Features

- Upload videos to your Wistia account straight from an entry field.
- Add existing videos simply by copy-pasting the video's url - no more deciding which embed method to choose

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic control panel and click **install**, or run the following command from your project root:

``` bash
composer require jmalko/wistia
```

In order for the field to work, you must add a Wistia API key and Project ID to your .env file like this:
``` bash
WISTIA_API=xxxxx
WISTIA_PROJECT_ID=xxxxx
```

You will find videos you upload here to appear within your Wistia project.  You are free to organize them how you wish by logging into your Wistia account at a later time.

## How to Use

Add a Wistia field to any blueprint or fieldset.  When adding or editing an entry, you will now have the ability to select a video to upload, which will start right away.  Once the upload is complete and the video is "encoding", you will notice a web address appear in the box below the Uploader.  You can save and leave the entry page at that time.

If you want to use an existing video instead of uploading a new one, simply browse to the video on your accoutn and copy-paste the web address into the input below the Wistia Uploader.