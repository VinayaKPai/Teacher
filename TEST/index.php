<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>VKP Solutions</title>
				<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<!-- Bootstrap CSS -->
				    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
				  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<link rel="stylesheet" type="text/css" href="/stylesheet.css"  />

	</head>

<body class="body container">
	<?php

		include $_SERVER['DOCUMENT_ROOT']."/Components/classNumberDropDown.php";
		include $_SERVER['DOCUMENT_ROOT']."/Components/subjectDropDown.php";

		[
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 11},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 13},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 27},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 28},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 41},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 51},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 53},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 63},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 64},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 11},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 13},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 27},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 28},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 41},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 51},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 53},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 63},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 64}
		]
		[
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 11},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 13},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 27},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 28},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 41},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 51},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 53},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 63},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 1, "Sec Name": "A", "Stu Id": 64}
		]
		[
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 11},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 13},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 27},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 28},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 41},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 51},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 53},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 63},
			{"Class Id": 1, "Class Num": "I", "Sec Id": 2, "Sec Name": "B", "Stu Id": 64}
		]

		$clsData
		Array (
			[0] => 1
			[CId] => 1
			[1] => I
			[Class] => I
			[2] => 2
			[Sec Id] => 2
			[3] => B
			[Section] => B
			[4] => [
				{"User Id": 27, "ST RN": 33, "St FN": "Aadeep", "St MN": "", "St LN": "Badami", "ST CId": 1, "ST SecId": 2},
				{"User Id": 64, "ST RN": 58, "St FN": "Ighu", "St MN": null, "St LN": "Hughug", "ST CId": 1, "ST SecId": 2}
			]
			[CSections] => [
				{"User Id": 27, "ST RN": 33, "St FN": "Aadeep", "St MN": "", "St LN": "Badami", "ST CId": 1, "ST SecId": 2},
				{"User Id": 64, "ST RN": 58, "St FN": "Ighu", "St MN": null, "St LN": "Hughug", "ST CId": 1, "ST SecId": 2}
			]
		)
Array ( [Id] => 1 [Type] => A [Class] => I [Class Id] => 1 [SectionId] => 1 [Section] => A [Open From] => 2020-12-01 [Open Till] => 2020-12-15 [Deployed?] => 1 [Assessment ID] => 15 )
Array ( [Id] => 7 [Type] => A [Class] => I [Class Id] => 1 [SectionId] => 1 [Section] => A [Open From] => 2020-12-01 [Open Till] => 2020-12-22 [Deployed?] => 1 [Assessment ID] => 16 )
Array ( [Id] => 2 [Type] => A [Class] => I [Class Id] => 1 [SectionId] => 2 [Section] => B [Open From] => 2020-12-01 [Open Till] => 2020-12-15 [Deployed?] => 1 [Assessment ID] => 15 )
Array ( [Id] => 5 [Type] => A [Class] => IX [Class Id] => 9 [SectionId] => 2 [Section] => B [Open From] => 2020-12-03 [Open Till] => 2020-12-10 [Deployed?] => 1 [Assessment ID] => 6 )
Array ( [Id] => 6 [Type] => A [Class] => IX [Class Id] => 9 [SectionId] => 4 [Section] => D [Open From] => 2020-12-03 [Open Till] => 2020-12-10 [Deployed?] => 1 [Assessment ID] => 6 )
	 ?>
</body>
</html>
