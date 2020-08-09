**Retrieve Payment Intent**
----
Generate and retrieve a [PaymentIntent](https://stripe.com/docs/api/payment_intents) object using the Stripe API. 

Payment activity involves customer interactions that occur outside the flow of an application. This object allows you to track and react to these interactions.

* **URL**

/api/orders/intent

* **Method:**

  `POST`
  
*  **URL Params**

   None

* **Data Params**

  **Required:**
   
     `amount=[integer]` (amount should be in center. eg. $10 = 1000)

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{ client_secret : [PaymentIntentToken] }`

* **Error Response:**

  * **Code:** 422 <br />
    **Content:** `{ error : "Amount must be an integer" }`
 
* **Sample Call:**

  ```
   curl --header "Content-Type: application/json" \
     --request POST \
     --data '{"amount":1000}' \
     /api/orders/intent
  ```

**Submit Order**
----
Submit an order. Payment will be validated by Stripe and order format will be validated by the server.

* **URL**

/api/orders/process

* **Method:**

  `POST`
  
*  **URL Params**

   **Required:**
   
   Order:
   ````
   date=[timestamp] (Unix timestamp of requested order date/time)
   location=[integer] (Location ID)
   name=[string]
   email=[email]
   subtotal=[integer|float]
   tax=[integer|float]
   gratuity=[integer|float]
   total=[integer|float]
   items=[array]
   ````
   
   Order Item:
   ````
   description=[string]
   qty=[integer]
   price=[integer|float]
   ````
   
   **Optional:**
      
      Order:
      ````
      phone=[string] 
      curbside=[boolean]
      utentils=[boolean]
      instructions=[string]
      ````
      Order Item:
      ````
      requests=[string]
      ````

* **Data Params**

  None

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{"date":1597246200,"location":1,"name":"Matthew Beaumont","email":"test@test.com","phone":"(201) 555-1234","curbside":0,"utensils":1,"instructions":"Please include extra ketchup","subtotal":40,"tax":4,"gratuity":4,"total":48,"status":0,"source":0,"printed":0,"type":0,"created_at":1596989277,"updated_at":1596989277,"id":5,"number":"1000005"}`

* **Error Response:**

  * **Code:** 422 <br />
    **Content:** `{ error : [description of invalid data] }`
 
* **Sample Call:**

  ```
   curl --header "Content-Type: application/json" \
     --request POST \
     --data '{"date":1597246200,"location":1,"name":"Matthew Beaumont","email":"test@test.com","phone":"(201) 555-1234","curbside":false,"utensils":true,"instructions":"Please include extra ketchup","subtotal":40,"tax":4,"gratuity":4,"total":48,"items":[{"description":"Fiesta Cubana","qty":1,"price":40,"requests":""}]}' \
     /api/orders/process
  ```