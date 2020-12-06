<?php include '../view/header.php'; ?>
<main>
    
    <h2> Course Information of <?php echo $instructor->get_name() . " classes "; ?> </h2>
    
    <table>
        <tr>
            <th>Course ID</th>
            <th>Course Name </th>
            <th>Semester</th>
            <th>Time</th>
            <th>Classroom</th>
            <th>Student List</th>
        </tr>
        <?php foreach ($courses as $course) : ?>
        <tr>
            <td><?php echo $course['course_id']; ?></td>
            <td><?php echo $course['course_name']; ?></td>
            <td><?php echo $course['semester']; ?></td>
            <td><?php echo $course['time']; ?></td>
            <td><?php echo $course['classroom']; ?></td>
            <td><form action="../login" method="post">
                <input type="hidden" name="action" value="slist">
                <input type="hidden" name="instructor_id" value="<?php echo $course['instructor_id'];?>">
                <input type="hidden" name="course_id"  value="<?php echo $course['course_id'];?>">
                <input type="submit" value="studentlistr">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>



</main>
<?php include '../view/footer.php'; ?>
