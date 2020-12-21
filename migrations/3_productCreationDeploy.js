const ProductCreation = artifacts.require("ProductCreation");

module.exports = function (deployer) {
  deployer.deploy(ProductCreation);
};
