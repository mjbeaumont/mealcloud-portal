# Restaurant Ordering App

## Introduction
This is the back end code for a prototype of a re-usable restaurant ordering app. The front end can be found [here](https://www.github.com/mjbeaumont/mealcloud-demo). 

This was used to pitch the idea of a re-usable ordering platform that could embedded in the overall design of a restaurant's website to allow them to accept online orders quickly, and was created in under a month. It is a WIP.

Please see [TODO](#TODO) for important notes.

See [DEMO](https://mealcloud-portal.beaumontwebdev.com) 

## Technologies Used
* Yii Framework 2
* Composer
* Stripe PHP SDK
* DotENV

## Features
1. Exposes API to accept orders from front end app.
2. Allows creation of multiple users
3. Users can manage order status
4. Orders submit to a backend portal (see above) where they are stored for processing.

## API

See description of endpoints [here](api.md)

## Installation

````
composer install
````

Create a MySQL database. Copy .env.example to .env and fill in your database credentials. Then run:

````
./yii migrate
````
You will also need a Stripe test API key, and you should enter all possible domains where orders can be submitted in order to configure the CORS response of the API.

## TODO

1. For purposes of this demo, the menu and cart totals are being provided by the frontend. We would NEVER do this in real life, so all of this functionality should be moved into this repo.
1. Add Unit/E2E tests