<?php
CREATE VIEW StudentsByTeachers AS
SELECT CTT.userId, C.classId, S.sectionName,
json_arrayagg(DISTINCT
  json_object(
    'C Id',CTT.classId,
    'Class / Std',C.classNumber,
    'SECID',SD.sectionId,
    'Sections',S.sectionName,
    'RN',SD.rollNumber,
    'StFN',U.firstName,
    'StMN',U.middleName,
    'StLN',U.lastName
  )
) as 'STUDENTS',
COUNT(SD.userId) AS 'Count'
FROM classes_taught_by_teacher as CTT
INNER JOIN studentdetails AS SD ON CTT.classId = SD.classId
INNER JOIN users as U ON SD.userId = U.userId
Inner JOIN classes as C ON SD.classId = C.classId
INNER JOIN sections as S ON CTT.sectionId = S.sectionId
GROUP BY CTT.userId


     userId      classNumber       sectionName    Count
     1              I                 A           18
     STUDENTS
      {"C ID": 1, "Class / Stc": "I", "SECID": 5, "Sections": "A", "RN": 3, "StFN": "Vartha", "StMN": "", "StLN": "Manishu"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 2, "Sections": "A", "RN": 33, "StFN": "Aadeep", "StMN": "", "StLN": "Badami"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 3, "Sections": "A", "RN": 43, "StFN": "Dabeet", "StMN": "", "StLN": "Bala"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 3, "Sections": "A", "RN": 17, "StFN": "Aabhas", "StMN": "", "StLN": "Agate"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 5, "Sections": "A", "RN": 57, "StFN": "Ighu", "StMN": null, "StLN": "Guhuh"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 2, "Sections": "A", "RN": 33, "StFN": "Aadeep", "StMN": "", "StLN": "Badami"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 1, "Sections": "A", "RN": 53, "StFN": "Roja", "StMN": "dul", "StLN": "Paitu"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 3, "Sections": "A", "RN": 17, "StFN": "Aabhas", "StMN": "", "StLN": "Agate"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 5, "Sections": "A", "RN": 57, "StFN": "Ighu", "StMN": null, "StLN": "Guhuh"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 6, "Sections": "A", "RN": 34, "StFN": "Aadesh", "StMN": "", "StLN": "Bahl"},{"C ID": 1, "Class / Stc": "I", "SECID": 1, "Sections": "A", "RN": 53, "StFN": "Roja", "StMN": "dul", "StLN": "Paitu"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 4, "Sections": "A", "RN": 19, "StFN": "Aabhavannan", "StMN": "", "StLN": "Agrawal"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 2, "Sections": "A", "RN": 58, "StFN": "Ighu", "StMN": null, "StLN": "Hughug"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 6, "Sections": "A", "RN": 34, "StFN": "Aadesh", "StMN": "", "StLN": "Bahl"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 5, "Sections": "A", "RN": 3, "StFN": "Vartha", "StMN": "", "StLN": "Manishu"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 4, "Sections": "A", "RN": 19, "StFN": "Aabhavannan", "StMN": "", "StLN": "Agrawal"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 2, "Sections": "A", "RN": 58, "StFN": "Ighu", "StMN": null, "StLN": "Hughug"},
      {"C ID": 1, "Class / Stc": "I", "SECID": 3, "Sections": "A", "RN": 43, "StFN": "Dabeet", "StMN": "", "StLN": "Bala"}


     1
     I
     B
     {"C ID": 1, "Class / Stc": "I", "SECID": 2, "Sections": "B", "RN": 33, "StFN": "Aadeep", "StMN": "", "StLN": "Badami"},{"C ID": 1, "Class / Stc": "I", "SECID": 3, "Sections": "B", "RN": 17, "StFN": "Aabhas", "StMN": "", "StLN": "Agate"},{"C ID": 1, "Class / Stc": "I", "SECID": 5, "Sections": "B", "RN": 57, "StFN": "Ighu", "StMN": null, "StLN": "Guhuh"},{"C ID": 1, "Class / Stc": "I", "SECID": 1, "Sections": "B", "RN": 53, "StFN": "Roja", "StMN": "dul", "StLN": "Paitu"},{"C ID": 1, "Class / Stc": "I", "SECID": 6, "Sections": "B", "RN": 34, "StFN": "Aadesh", "StMN": "", "StLN": "Bahl"},{"C ID": 1, "Class / Stc": "I", "SECID": 4, "Sections": "B", "RN": 19, "StFN": "Aabhavannan", "StMN": "", "StLN": "Agrawal"},{"C ID": 1, "Class / Stc": "I", "SECID": 2, "Sections": "B", "RN": 58, "StFN": "Ighu", "StMN": null, "StLN": "Hughug"},{"C ID": 1, "Class / Stc": "I", "SECID": 5, "Sections": "B", "RN": 3, "StFN": "Vartha", "StMN": "", "StLN": "Manishu"},{"C ID": 1, "Class / Stc": "I", "SECID": 3, "Sections": "B", "RN": 43, "StFN": "Dabeet", "StMN": "", "StLN": "Bala"}
     9
     1
     VIII
     C
     {"C ID": 8, "Class / Stc": "VIII", "SECID": 5, "Sections": "C", "RN": 7, "StFN": "Joori", "StMN": "", "StLN": "Poori"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 3, "Sections": "C", "RN": 27, "StFN": "Aadalarasan", "StMN": "", "StLN": "Arora"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 2, "Sections": "C", "RN": 47, "StFN": "Dadhica", "StMN": "", "StLN": "Balay"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 5, "Sections": "C", "RN": 15, "StFN": "Aabhra", "StMN": "", "StLN": "Acharya"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 5, "Sections": "C", "RN": 41, "StFN": "Daasu", "StMN": "", "StLN": "Bal"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 4, "Sections": "C", "RN": 49, "StFN": "Anuja", "StMN": null, "StLN": "Sujan"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 5, "Sections": "C", "RN": 9, "StFN": "Vijay", "StMN": "", "StLN": "Vijuma"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 5, "Sections": "C", "RN": 8, "StFN": "Faltu", "StMN": "", "StLN": "Baltu"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 2, "Sections": "C", "RN": 36, "StFN": "Aadhan", "StMN": "", "StLN": "Bail"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 1, "Sections": "C", "RN": 11, "StFN": "fikk", "StMN": "", "StLN": "Sicck"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 2, "Sections": "C", "RN": 25, "StFN": "Aachuthan", "StMN": "", "StLN": "Anne"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 2, "Sections": "C", "RN": 46, "StFN": "Dadasaheb", "StMN": "", "StLN": "Balasubramanian"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 1, "Sections": "C", "RN": 62, "StFN": "frg", "StMN": null, "StLN": "ghj"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 1, "Sections": "C", "RN": 10, "StFN": "Aditya", "StMN": "", "StLN": "Pai"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 4, "Sections": "C", "RN": 48, "StFN": "Priti", "StMN": null, "StLN": "Ganguli"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 1, "Sections": "C", "RN": 12, "StFN": "Abhju", "StMN": "", "StLN": "Soja"}
     16
     1
     VIII
     D
     {"C ID": 8, "Class / Stc": "VIII", "SECID": 1, "Sections": "D", "RN": 12, "StFN": "Abhju", "StMN": "", "StLN": "Soja"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 5, "Sections": "D", "RN": 7, "StFN": "Joori", "StMN": "", "StLN": "Poori"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 3, "Sections": "D", "RN": 27, "StFN": "Aadalarasan", "StMN": "", "StLN": "Arora"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 2, "Sections": "D", "RN": 47, "StFN": "Dadhica", "StMN": "", "StLN": "Balay"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 5, "Sections": "D", "RN": 15, "StFN": "Aabhra", "StMN": "", "StLN": "Acharya"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 5, "Sections": "D", "RN": 41, "StFN": "Daasu", "StMN": "", "StLN": "Bal"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 4, "Sections": "D", "RN": 49, "StFN": "Anuja", "StMN": null, "StLN": "Sujan"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 5, "Sections": "D", "RN": 9, "StFN": "Vijay", "StMN": "", "StLN": "Vijuma"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 5, "Sections": "D", "RN": 8, "StFN": "Faltu", "StMN": "", "StLN": "Baltu"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 2, "Sections": "D", "RN": 36, "StFN": "Aadhan", "StMN": "", "StLN": "Bail"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 1, "Sections": "D", "RN": 11, "StFN": "fikk", "StMN": "", "StLN": "Sicck"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 2, "Sections": "D", "RN": 25, "StFN": "Aachuthan", "StMN": "", "StLN": "Anne"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 2, "Sections": "D", "RN": 46, "StFN": "Dadasaheb", "StMN": "", "StLN": "Balasubramanian"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 1, "Sections": "D", "RN": 62, "StFN": "frg", "StMN": null, "StLN": "ghj"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 1, "Sections": "D", "RN": 10, "StFN": "Aditya", "StMN": "", "StLN": "Pai"},{"C ID": 8, "Class / Stc": "VIII", "SECID": 4, "Sections": "D", "RN": 48, "StFN": "Priti", "StMN": null, "StLN": "Ganguli"}

 ?>
