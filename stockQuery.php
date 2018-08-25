

total quantity purchases productname wise-

SELECT sum(quantity) as totalquantitypurchase,productId FROM tbl_purchase_detail GROUP BY(productId)


total quantity sell productname wise-

SELECT sum(quantity) as totalquantitysell,productId FROM tbl_sell_detail GROUP BY(productId)


quantity purchase till particular date-
SELECT SUM(quantity) as totalquantitypurchase,productId FROM tbl_purchase_detail INNER JOIN tbl_purchase_master
 ON tbl_purchase_master.id=tbl_purchase_detail.purchaseMasterId
 WHERE stockEntryDate<="2018-05-09" GROUP by(productId)
 
 
 
 
 select sellingPrice, max(dateOfEffect) as dateOfEffect from tbl_sell_price where productId=$product and
 dateOfEffect IN (select max(dateOfEffect) from tbl_sell_price where dateOfEffect <= now() and productId=$product)
 
 
  create view purchaseMasterDetail as
 SELECT tbl_product_master.id, SUM(totalAmount) as totalpurchase,SUM(quantity) as sumpurchasequantity, tbl_product_master.productName,
 tbl_unit_master.unitName FROM tbl_purchase_detail INNER JOIN tbl_product_master ON tbl_product_master.id=tbl_purchase_detail.productId INNER JOIN 
 tbl_unit_master ON tbl_product_master.unitId=tbl_unit_master.id GROUP BY productId
 
 
 
 
 SELECT * from purchasemasterdetail LEFT JOIN sellmasterdetail ON purchasemasterdetail.id=sellmasterdetail.id
 
 
 
 SELECT SUM(quantity) as totalquantity from tbl_purchase_detail INNER JOIN tbl_purchase_master ON
 tbl_purchase_master.id= tbl_purchase_detail.productId WHERE tbl_purchase_master.stockEntryDate<'2108-06-04' AND tbl_purchase_detail.productId='23'
 
 
 
 SELECT SUM(quantity) as totalsell from tbl_sell_detail INNER JOIN tbl_sell_master ON
 tbl_sell_master.id= tbl_sell_detail.productId WHERE tbl_sell_master.stockEntryDate<'2108-06-04' AND tbl_sell_detail.productId='23'
 
 
 SELECT SUM(quantity) as totalsell from tbl_sell_detail INNER JOIN tbl_sell_master ON tbl_sell_master.id= tbl_sell_detail.productId WHERE
 tbl_sell_master.invoiceDate<'2108-06-04' AND tbl_sell_detail.productId='23'

 
 
 
 
 
