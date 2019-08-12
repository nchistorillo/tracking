# Pizza Delivery System

Currently being hosted at IMB Bluemix.

Url: https://pizzavillaci.eu-gb.mybluemix.net

##### ***[Sample GIFS](#gifs)***
**Note:** GIFS may take some time to load completely and run.
<br/>

[Demo Video<br>![Demo Video Pizza Delivery System](https://img.youtube.com/vi/ITDsHoVaPdg/0.jpg)](https://www.youtube.com/watch?v=ITDsHoVaPdg)


**Note**: _This system uses Google Maps API, to provide better user experience while Ordering and furthermore to track after Order has been placed. So, ensure that Javascript is enabled._

#### Login Credentials

**Note:** For viewing admin page, one can also add /admin.php in the end.

| User Type     | Email ID               | Password |
| :-----------: |:----------------------:| :-------:|
| Admin         | admin@pizzavilla.com   |   admin  |    
| Supervisor    | vinay_sp@pizzavilla.com|     a    |
| Chef          | thomas@gmail.com       |   keller |
| Delivery Staff| axyz@gmail.com         |    a  |

<br>


A system which handles multiple types of users as listed above and co-ordinates between them, to result in efficient and timely delivery.

Users can get real time update of their order, including live tracking of delivery boy on road.

### GIFS

#### Add Address

![Add Address](.readme_gifs/Add_address.gif)

#### Checkout

![Checkout](.readme_gifs/Checkout.gif)

#### Menu Add/Edit/Delete

![Menu Add/Edit/Delete](.readme_gifs/Menu_func.gif)

#### Delivery

![Delivery](.readme_gifs/Delivery.gif)

#### User Menu

![User Menu](.readme_gifs/Small_Menu.gif)

Listed below are some key functionalities for each type of user:

##### Customer
* Can view menu items and add to Cart
* Can checkout Cart and order Items
* Can automatically get the closest outlet, including distance and directions, while checkout
* Can view status of ordered Items
* Can track Order on Map, if on the way


##### Admin
* Can view HeatMap of orders
* Add/edit/delete Outlets
* Add/edit/delete supervisor for an Outlet
* Can search for users, by name, email, address, etc
* Can add/edit/delete menu items, including uploading images for the same

##### Supervisor
* can add/edit/delete staff members, namely chefs and delivery staff for the outlet assigned.


##### Chef
* Can view contents of the items ordered, including ingredients for each item
* Can change the status of Order.

##### Delivery staff
* Can view contents of the items ordered, including ingredients for each item
* Can start delivery for an order while being live tracked
