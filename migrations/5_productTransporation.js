const ProductTransportation = artifacts.require("ProductTransportation");

module.exports = function (deployer) {
  deployer.deploy(ProductTransportation);
};
