// SPDX-License-Identifier: UNLICENSED
pragma solidity ^0.6.0;

import "./productCreation.sol";

contract ProductSale is ProductCreation {
    address payable recipient;

    enum ProductTransportStatus {awaitingPickUp, inTransit, delivered}
    enum ProductCondition {perfect, damaged}

    struct ProductOrder {
        VendorInventory orderedItem;
        uint256 quantity;
        uint256 cashPaid;
        address orderedBy;
        ProductTransportStatus transportStatus;
    }

    ProductOrder[] orders;
    mapping(uint256 => address) ordersMade;

    event newOrder(
        uint256 _id,
        string name,
        uint256 itemNumber,
        uint256 amountPaid,
        ProductTransportStatus orderStatus,
        address new_owner
    );

    modifier rightPrice(uint256 _itemId, uint256 _quantity) {
        require(
            msg.value == _quantity.mul(vendorInventory[_itemId].price),
            "You have to input the right amount"
        );
        _;
    }

    modifier _onSale(uint256 _itemId) {
        require(
            vendorInventory[_itemId].saleStatus == ProductSaleStatus.onSale,
            "Item is not on sale"
        );
        _;
    }

    function orderProduct(uint256 itemID, uint256 quantity)
        external
        payable
        usersOnly
        _onSale(itemID)
        rightPrice(itemID, quantity)
    {
        require(quantity >= 1, "You have not input a quantity");
        UserType vendorRole =
            users[userToProfile[vendorInventory[itemID].seller]].role;
        if (vendorRole == UserType.manufacturer) {
            require(
                quantity >= vendorInventory[itemID].minimumOrderQuantity,
                " Your order quantity is below the minimum order quantity"
            );
        }
        uint256 totalCharge = quantity.mul(vendorInventory[itemID].price);
        orders.push(
            ProductOrder(
                vendorInventory[itemID],
                quantity,
                totalCharge,
                msg.sender,
                ProductTransportStatus.awaitingPickUp
            )
        );
        uint256 id = orders.length - 1;
        ordersMade[id] = msg.sender;
        emit newOrder(
            id,
            vendorInventory[itemID].item.name,
            quantity,
            totalCharge,
            orders[id].transportStatus,
            msg.sender
        );
    }

    function acknowledgeReciept(uint256 orderId)
        external
        usersOnly
        returns (string memory)
    {
        require(msg.sender == orders[orderId].orderedBy);
        recipient = payable(orders[orderId].orderedItem.seller);
        recipient.transfer(orders[orderId].cashPaid);
        orders[orderId].transportStatus = ProductTransportStatus.delivered;
        return ("Delivered successfully");
    }
}
