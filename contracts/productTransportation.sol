// SPDX-License-Identifier: UNLICENSED
pragma solidity ^0.6.0;

import "./productSale.sol";

contract ProductTransportation is ProductSale {
    struct TransportNote {
        ProductOrder order;
        ProductTransportStatus transportStatus;
        ProductCondition condition;
        TransportService service;
        address transportedBy;
    }

    function productReciept() internal {}
}

// 0x4710f0c70e4da75bee5f2a8a987d639abab961ee
