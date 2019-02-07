// create bootstrap disposable messages
const createMessages = (message) => {
    let str = '';
    if (message['errors'].length != 0) {
        message['errors'].forEach(e => {
            str += '<div class="alert alert-danger alert-dismissible fade show" role="alert">' + e +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        });
    }

    if (message['success'].length != 0) {
        message['success'].forEach(e => {
            str += '<div class="alert alert-success alert-dismissible fade show" role="alert">' + e +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        })
    }
    return str;
}

// it create table for fetched data
const createTable = (data) => {
    let str =
        '<table class="table table-striped"><thead><tr><th scope="col">#</th><th scope="col">Roll No</th><th scope="col">Name</th><th scope="col">Marks</th><th scope="col" colspan="3">Actions</th></tr></thead><tbody>';
    let i = 0;
    data.forEach((s) => {
        str += '<tr><th scope="row">' + ++i + '</th><td>' + s['rollno'] + '</td><td>' + s['name'] +
            '</td><td>' + s['marks'] +
            '</td><td><input type="button" class="btn btn-info" value="View" name="View" ></td><td> <input type="button" class="btn btn-warning" value="Edit" name="editStudent"  onClick="editStudent(' +
            s['rollno'] + ',\'' + s['name'].trim() + '\',' + s['marks'] +
            ')" ></td><td> <input type="button" class="btn btn-danger" value="Delete" onclick=deleteStudent(' +
            s['rollno'] + ')  ></td></tr>';
    })

    return str += '</tbody></table>';
}

