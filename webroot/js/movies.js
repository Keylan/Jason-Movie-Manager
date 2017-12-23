var grid;
function edit(id) {
  $.get({
    url: 'movies/view/' + id + '.json',
    success: function(data) {
      // build modal content with handlebars and retrieved data
      $(Handlebars.compile($('#modal-template').html())(data.movie)).modal().on('shown.bs.modal', function() {
        $('form', this).validator().on('submit', submit);;
        if (data.movie.rating) {
          $('input[name=rating][value='+data.movie.rating+']', this).prop('checked', true);
        }
        if (data.movie.format) {
          $('select[name=format]', this).val(data.movie.format);
        }
      }).on('hidden.bs.modal', function () {
        $(this).data('bs.modal', null);
      });
    }
  });
}

function deleteMovie(id) {
  $.post({
    url: 'movies/delete/' + id + '.json',
    success: function(data) {
      grid.ajax.reload();
    }
  });
}

function submit (e) {
  if (!e.isDefaultPrevented()) {
    e.preventDefault();

    var id = $('input[name=id]', $(e.target)).val();

    $.post({
      url: '/movies/' + (id ? 'edit/' + id : 'add') + '.json',
      data: $(e.target).serialize(),
      success: function () {
        grid.ajax.reload();
        $('.modal').modal('hide');
      }
    });
  }
}

$(document).ready(function() {
  grid = $('#moviegrid').on('draw.dt', function() {
    // remove all click handlers
    $('.glyphicon-pencil').off('click');
    $('.glyphicon-remove').off('click');

    // set new
    $('.glyphicon-pencil').on('click', function() {
      edit($(this).data('id'));
    });
    $('.glyphicon-remove').on('click', function() {
      deleteMovie($(this).data('id'));
    });
  }).DataTable({
    ajax: {
      dataSrc: 'movies',
      url: 'movies/index.json'
    },
    columns: [
      {
        className: 'hidden-xs',
        data: 'id'
      },
      {
        className: 'dt-body-right',
        data: 'title'
      },
      {
        className: 'dt-body-right',
        data: 'format',
      },
      {
        className: 'dt-body-right',
        data: 'length',
        render: function(data, type, row, meta) {
          return Math.floor(data/60) + ' hr ' + (data%60) + ' m';
        }
      },
      {
        className: 'dt-body-right hidden-xs',
        data: 'release_year'
      },
      {
        data: 'rating',
        className: 'dt-body-right'
      },
      {
        data: 'id',
        orderable: false,
        render: function(data) {
          return '<span data-id="' + data + '" style="cursor:pointer;" class="glyphicon glyphicon-pencil"></span>' +
            '<br class="visible-xs"/>' +
            '<span style="padding-left: 10px" class="hidden-xs"></span>' +
            '<span data-id="' + data + '" style="cursor:pointer;" class="glyphicon glyphicon-remove"></span>';
        }
      }
    ]
  });

  $('#addMovieButton').on('click', function() {
    $(Handlebars.compile($('#modal-template').html())()).modal().on('shown.bs.modal', function() {
      $('form', this).validator().on('submit', submit);;
    }).on('hidden.bs.modal', function () {
      $(this).data('bs.modal', null);
    });
  });


});