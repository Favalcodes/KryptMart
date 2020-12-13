pragma solidity ^0.6.0;

import './productSale.sol';

contract ProductTransportation is ProductSale  {


    struct TransportNote{
        ProductOrder order
        ProductTransportStatus transportStatus;
        TransportService service;
        address transportedBy;
    }

    function productReciept() {

    }
    
}   
   
