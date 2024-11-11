$(function () {
    computeTotal();
    $(".selectitem").change(function () { //each time the select item changes value, we recompute the info
        computeTotal();
    });
});

function computeTotal() {
    /* Grab values from elements and store in array for further processing */
    var itemNameArray = []; // initialise empty array for item names
    var priceArray = []; // initialise empty array for prices
    var qtyArray = []; // initialise empty array for qty
    var selectedQty = 0; // used to test if any qty>0 has been selected
    $(".itemname").each(function () { // we grab the values of each of the item's name from the itemname class into an array
        itemNameArray.push($(this).text());
    });
    $(".price").each(function () { // we grab the values of each of the item's price from the price class into an array
        priceArray.push(parseFloat($(this).text()));
    });
    $(".selectitem option:selected").each(function () { // we grab the values of each of the item selected qty from the selectitem class into an array
        qtyArray.push(parseFloat($(this).val()));
        selectedQty += parseFloat($(this).val()); // increase qty selected
    });
    /* Process the output string according to values in the name, price and qty arrays
     */
    var totalPrice = 0.0; // reset the total price to zero first
    var output = "<hr>"; // create the string to be inserted into the Order information box <div id="itemised"> later.
    if (selectedQty > 0) { // if at least 1 food item is selected, we cycle through all selected items and calculate the output
        output = output + "<table class='itemtable'><tr><th>Item</th><th>Price</th><th></th><th>Qty</th><th class='rightalign'>Amt</th></tr>";
        for (var i = 0; i < itemNameArray.length; i++) { // for each of the food item in the array, we will extract the name, price and qty. 
            if (qtyArray[i] > 0) { // generate a particular food item if the qty>0
                output = output + "<tr><td class='leftalign'>" + itemNameArray[i] + "</td><td>$" + priceArray[i].toFixed(2) + "</td><td>x</td><td>" + qtyArray[i] + "</td><td class='rightalign'>$" + (priceArray[i] * qtyArray[i]).toFixed(2) + "</td></tr>";
                totalPrice = totalPrice + priceArray[i] * qtyArray[i]; // compute the total price
            }
        }
        // generate the subtotal, the gst component and the TOTAL
        output = output + "<tr> <td class='totalamt leftalign' colspan=4>SUBTOTAL</td><td class='totalamt rightalign'>$" + totalPrice.toFixed(2) + "</td> </tr>";
        output = output + "<tr> <td class='totalamt leftalign' colspan=4>7% GST</td><td class='totalamt rightalign'>$" + (totalPrice * 0.07).toFixed(2) + "</td> </tr>";
        output = output + "<tr> <td class='totalamt leftalign' colspan=4>TOTAL</td><td class='totalamt rightalign'>$" + (totalPrice * 1.07).toFixed(2) + "</td> </tr>";
        $('#submit_button').prop("disabled", false); //enables the submit button
        $('#submit_button').removeClass("disabled"); // visually ungrey the button so user knows can click. This class is found in global.css
    } else { // if no qty was selected
        output = output + "No food item selected."; // show message to user
        $('#submit_button').prop("disabled", true); //disables the submit button in the web page (cannot click)
        $('#submit_button').addClass("disabled"); // visually grey out the button so user knows cannot click.
    }
    output = output + "</table><hr>"; // ending of table and add a horizontal rule/line.
    // Insert the string we generated in the the #itemised div.
    $("#itemised").html(output); // set the itemised div with generated content
}