<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie[]|\Cake\Collection\CollectionInterface $movies
 */
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<!-- Template -->
<script id="modal-template" type="text/x-handlebars-template">
    <div class="modal fade" id="addMovie" tabindex="-1" role="dialog" aria-labelledby="addMovieLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Movie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" data-toggle="validator" id="addForm">
                        <input type="hidden" name="id" value="{{id}}" />
                        <div class="form-group has-feedback">
                            <label class="control-label">Title</label>
                            <input value="{{title}}" name="title" placeholder="Title" class="form-control"  type="text" maxlength="50" minlength="1" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="control-label">Format</label>
                            <select name="format" class="form-control" required>
                                <option value="VHS">VHS</option>
                                <option value="DVD">DVD</option>
                                <option value="Streaming">Streaming</option>
                            </select>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="control-label">Length</label>
                            <input value="{{length}}" name="length" placeholder="Length" class="form-control"  type="number" min="1" max="499" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="control-label">Release Year</label>
                            <input value="{{release_year}}" name="release_year" placeholder="Release Year" class="form-control"  type="number" min="1801" max="2099" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="control-label">Rating</label><br/>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="rating" value="1">
                                    1
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="rating" value="2">
                                    2
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="rating" value="3">
                                    3
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="rating" value="4">
                                    4
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label>
                                    <input type="radio" name="rating" value="5">
                                    5
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</script>

<div class="movies index large-12 medium-11 columns content">
    <h3><?= __('Movies') ?></h3>

    <div style="padding-bottom: 20px;">
        <button type="button" class="btn btn-primary" id="addMovieButton">
            Add Movie
        </button>
    </div>

    <table id="moviegrid" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="hidden-xs">Id</th>
            <th>Title</th>
            <th>Format</th>
            <th class="dt-body-right">Length</th>
            <th>Release Year</th>
            <th>Rating</th>
            <th></th>
        </tr>
        </thead>
    </table>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>

<script type="text/javascript" src="js/movies.js"> </script>