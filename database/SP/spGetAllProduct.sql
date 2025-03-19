DELIMITER //

CREATE PROCEDURE spGetAllProduct()
BEGIN
    SELECT 
        l.Naam AS LeverancierNaam, 
        l.ContactPersoon, 
        p.Naam AS ProductNaam, 
        ppl.Aantal
    FROM 
        productperleverancier ppl
    INNER JOIN 
        leverancier l ON ppl.LeverancierId = l.Id
    INNER JOIN 
        product p ON ppl.ProductId = p.Id
    ORDER BY 
        l.Naam ASC;
END //

DELIMITER ;