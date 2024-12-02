<?php include 'add_m.php'; ?>
<div class="container">
    <h1 id="head">Movie Dashboard</h1>
    <div class="moviedata">
        <span id="heading">Add Movie Details</span>
        <hr>
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <label for="id"> ID: </label><br>
                        <input type="text" id="id" name="id" required><br>
                    </td>
                    <td>
                        <label for="tittle"> Title : </label><br>
                        <input type="text" id="tittle" name="tittle" required><br>
                    </td>
                    <td>
                        <label for="genre"> Genre :</label>
                        <input type="text" id="genre" name="genre" required><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="vote"> Vote :</label>
                        <input type="text" id="vote" name="vote" required><br>
                    </td>
                    <td>
                        <label for="price"> Price :</label>
                        <input type="text" id="price" name="price" required><br>
                    </td>
                    <td>
                        <label for="date">Movie Relese Date :</label>
                        <input type="text" id="date" name="date" required><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="director"> Director :</label>
                        <input type="text" id="director" name="director" required><br>
                    </td>
                    <td>
                        <label for="actors"> Actors :</label>
                        <input type="text" id="actors" name="actors" required><br>
                    </td>
                    <td>&nbsp;</td>

                </tr>

                <tr>
                    <td>
                        <label for="shows">Show (2d/3d..):</label><br>
                        <input type="text" id="shows" name="shows" required><br>
                    </td>
                    <td>
                        <label for="language">Language :</label><br>
                        <input type="text" id="language" name="language" required><br>
                    </td>
                    <td>
                        <label for="times">Movie Duration:</label><br>
                        <input type="text" id="times" name="times" required><br>
                    </td>
                </tr>
                <tr>

                    <td>
                        <label for="about">About Movie:</label><br>
                        <input type="text" id="about" name="about" required><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <br>
                        <label for="user">Choose Movie poster :</label><br />
                        <input type="file" name="poster" id="poster" class="form-control"><br>
                        <label for="user">Choose More Movie poster :</label><br />
                        <input type="file" name="largeposter" id="largeposter" class="form-control"><br><br>

                    </td>
                </tr>

            </table>

            <input type="submit" name="addmoviebtn" id="addmovie" class="btns btn btn-danger addmoviebtn" value="Add Movie" />
        </form>
    </div>
    <?php
    $sqlshow = mysqli_query($conn, "SELECT * FROM movie ");  // Adjust the query to show recent movies
    ?>

    <div class="viewmoviedata">
        <span id="heading">Recent Movie Details</span>
        <hr>
        <table class="table table-hover">
            <thead class="table-danger">
                <tr>
                    <th scope="col">Movie_Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Relese-Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Director</th>
                    <th scope="col" colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($sqlshow)) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['release_date']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['director']; ?></td>
                        <td class="delete">
                            <form method="post" action="" style="display: inline;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                <!-- Use the button tag to wrap the icon -->
                                <button type="submit" name="delete" style="border: none; background: none; cursor: pointer;">
                                    <i class="fa-solid fa-trash" style="color: red;"></i> <!-- You can customize the icon's style -->
                                </button>

                            </form>
                        </td>
                        <td class=" update">
                            <form method="post" action="" style="display: inline;">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                <!-- Use the button tag to wrap the icon -->
                                <button type="button" style="border: none; background: none; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row['id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <div class="modal fade" id="modal<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalLabel<?php echo $row['id']; ?>">Update Details    &nbsp;  <span id="m"> <?php echo $row['title']; ?></span> </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Update form inside the modal -->
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label for="id"> ID: </label><br>
                                                                <input type="text" id="id" name="id" value="<?php echo $row['id']; ?>" required><br>
                                                            </td>
                                                            <td>
                                                                <label for="tittle"> Title : </label><br>
                                                                <input type="text" id="tittle" name="tittle" value="<?php echo $row['title']; ?>" required><br>
                                                            </td>
                                                            <td>
                                                                <label for="genre"> Genre :</label>
                                                                <input type="text" id="genre" name="genre" value="<?php echo $row['genre']; ?>" required><br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="vote"> Vote :</label>
                                                                <input type="text" id="vote" name="vote" value="<?php echo $row['vote']; ?>" required><br>
                                                            </td>
                                                            <td>
                                                                <label for="price"> Price :</label>
                                                                <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>" required><br>
                                                            </td>
                                                            <td>
                                                                <label for="date">Movie Relese Date :</label>
                                                                <input type="text" id="date" name="date" value="<?php echo $row['release_date']; ?>" required><br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="director"> Director :</label>
                                                                <input type="text" id="director" name="director" value="<?php echo $row['director']; ?>" required><br>
                                                            </td>
                                                            <td>
                                                                <label for="actors"> Actors :</label>
                                                                <input type="text" id="actors" name="actors" value="<?php echo $row['actors']; ?>" required><br>
                                                            </td>
                                                            <td>&nbsp;</td>

                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <label for="shows">Show (2d/3d..):</label><br>
                                                                <input type="text" id="shows" name="shows" value="<?php echo $row['shows']; ?>" required><br>
                                                            </td>
                                                            <td>
                                                                <label for="language">Language :</label><br>
                                                                <input type="text" id="language" name="language" value="<?php echo $row['language']; ?>" required><br>
                                                            </td>
                                                            <td>
                                                                <label for="times">Movie Duration:</label><br>
                                                                <input type="text" id="times" name="times" value="<?php echo $row['times']; ?>" required><br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="about">About Movie </label><br>
                                                                <input type="text" id="about" name="about" value="<?php echo $row['about']; ?>" required><br>
                                                            </td>
                                                        </tr>


                                                    </table>

                                                    <input type="submit" name="update" id="update" class="btns btn btn-danger addmoviebtn" value="update" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>