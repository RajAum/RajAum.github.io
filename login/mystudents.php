<?php include '../view/header.php'; 
$grades = array("A","B","C","D","F"); ?>
<main>
    <h1>Submit Grade </h1>
    <form action="../login/" method="post" id="grade_form">
    <input type="hidden" name="action" value="grade_form">
    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Name </th>
            <th>Student Grade</th>
        </tr>
        <?php foreach ($students as $student) : ?>
        <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['name']; ?></td>
            <td>
                <select name=grade>
                <?php foreach ($grades as $grade) : ?>
                <option value=<?php echo $grade; ?> > <?php echo $grade; ?> </option>
                <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <?php endforeach; ?>
      </table>
      <input id="submit"  type="submit" value="submit">

</main>
<?php include '../view/footer.php'; ?>
