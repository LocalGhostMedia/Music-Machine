Music-Machine
=============

Overview:

App and server code that anyone can use to create practically free mobile band applications.

The server code allows users to update a news feed, update show information, and upload any song with an easy user interface, and the app will dynamically load and cache the songs for playback.

The mobile app is meant for cross-platform deployment through the Intel HTML5 Development Enviroment.
The Intel tools are all free to use and the end result is a submitable application to iPhone, Android, and other app stores.

How to create app:
(I'll be making tutorial videos, but this is the quick and dirty instructions for now)

1. Go to http://xdk-software.intel.com/ and download the XDK

2. Sign up for an account, create a new app. You can select blank app since the code for it is in this repo.

3. Click the open root folder in the XDK and paste all the code from the "App Code" folder into the 3.4.0 folder

4. Click the "upload and build" button in the top right

5. Follow the step by step instructions to get the certs and correct assets your app will need.

6. Click build, when application is finished building, open email that's sent after builds on test device and select the download build link.


A lot of configuring of the server code has to match your websites root folder address to have the app connect.

My first task will be to clean up the code and make some nice comments so it's more easily understood.
