DELIMITER //

CREATE PROCEDURE spGetAllProductByDate(IN startdatum DATE, IN einddatum DATE)
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
    WHERE 
        ppl.DatumLevering BETWEEN startdatum AND einddatum
    ORDER BY 
        l.Naam ASC;
END //

DELIMITER ;