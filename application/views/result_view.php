<!-- views/search_results.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>

    <?php if (!empty($results)) : ?>
        <div class="table-responsiv">

            <table border="1" cellpadding="20" cellspacing="0" class="table table-striped" id="mytable">

                <div class="text-center">
                    <h1><u>VIEW</u></h1>
                </div>

                <thead     style= "background-color: #D0E775">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <?php echo $this->pagination->create_links(); ?>
                <tbody   style= "background-color: #86F0C9">
                    <?php
                    foreach ($results as $all) {
                    ?>
                        <tr>
                            <td><?php echo $all['id'] ?></td>
                            <td><?php echo $all['name'] ?></td>
                            <td><input type="checkbox" <?php if ($all['status'] == 1) {
                                                            echo "checked";
                                                        } ?> name="status" id="" value=""></td>
                            <td>
                                <a href="<?php echo base_url('delete/' . $all['id']) ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                            <td>
                                <a href="<?php echo base_url('editcategory/' . $all['id']) ?>" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    <?php }

                    ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>

</body>

</html>