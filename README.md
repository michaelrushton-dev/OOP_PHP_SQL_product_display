# OOP_PHP_SQL_product_display

My project to display items from a catalogue using OOP PHP and mySQL
to create a restful API.
The user can view the collection of items and also add a new item
which will have attributes defined by the parent class as well as
a unique attribute based on the type of item, which will be assigned by the newly
created object, for example
if the type is 'DVD' there will be a file size attribute, or if the
item were a piece of furniture it would dispay it's dimensions.
There is also a 'mass delete' option to delete selected items from the database.
<br>
<br>

# Instructions

### GET

To retreive all data from db, make a GET request to index.php (/)

### POST

To add a product, send POST request to /add_item and follow this json structure:

```json
{
    "sku": "1344495",
    "name": "Matilda",
    "price": "3.50",
    "type": "Book",
    "value": "23"
}
```

The application will instantiate a new product that extends the parent Product class based upon which type is entered in the POST request.
The user can choose between 'Book', 'DVD' and 'Furniture'. It will add the value to the correct column in the database: the value to be supplied for books is their weight in grams, for DVDs it is their size in MBs, and for furniture it is their dimensions e.g 24x12x24.

<br>

### DELETE

To delete one or more products, make a POST request to /delete and follow this json structure, adding in the id's of the items to be deleted:

```json
{
    "list": "10,44,49,45"
}
```
