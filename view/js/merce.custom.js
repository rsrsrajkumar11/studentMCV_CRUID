const editStudent = (roll, name, marks) => {
    $('#updateStudent input[name=rollno]').val(roll);
    $('#updateStudent input[name=oldrollno]').val(roll);
    $('#updateStudent input[name=name]').val(name);
    $('#updateStudent input[name=marks]').val(marks<10?'00'+marks:marks<99?'0'+marks:marks);
    $('#updateStudent').modal('show'); 
}

const deleteStudent = roll => {
    let response = confirm('Are you sure you want to delete the record');
    if (!response) return;
    let data = 'deleteStudent=&rollno=' + roll;
    $.ajax({
        type: "POST",
        url: '../controller/insertOrUpdate.php',
        data: data,
        success: (data) => {
            data = JSON.parse(data);
            console.log(data);
            alert(data[data['errors'].length != 0 ? 'error' : 'success']);
            document.location.reload();
        }
    });

    $(document).ready(() => {
    
    let retriveAlldata = () => {
        let data = 'showAll=showAll';
        $.ajax({
            type: "POST",
            url: '../controller/insertOrUpdate.php',
            data: data,
            success: (data) => {
                data = JSON.parse(data);
                data = data["data"];
                console.log( data);
                $('#retriveData').html(createTable(data));
            }
        });
    }
    retriveAlldata();


    $('#addRecord').submit((event) => {
        event.preventDefault();
        let data = $('#addRecord').serialize();
        data += '&createNew=createNew';
        $.ajax({
            type: "POST",
            url: '../controller/insertOrUpdate.php',
            data: data,
            success: (data) => {
                data = JSON.parse(data);
                console.log(data);
                $('#messages').html(createMessages(data));
                console.log(data['errors'].length);
                if (data['errors'].length == 0){
                    $('#addRecord input[name=rollno]').val('');
                    $('#addRecord input[name=name]').val('');
                    $('#addRecord input[name=marks]').val('');
                }
            }
        });

    });

    $('#update').submit(event=>{
        event.preventDefault();
        let data=$('#update').serialize();
        data='updateStudent=&'+data;
        console.log(data);

        $.ajax({
            type: "POST",
            url: '../controller/insertOrUpdate.php',
            data: data,
            success: (data) => {
                data = JSON.parse(data);
                $('#modelMessages').html(createMessages(data));

            }
        });

    });

});

}

$(document).ready(() => {
            
    let retriveAlldata = () => {
        let data = 'showAll=showAll';
        $.ajax({
            type: "POST",
            url: '../controller/insertOrUpdate.php',
            data: data,
            success: (data) => {
                data = JSON.parse(data);
                data = data["data"];
                console.log( data);
                $('#retriveData').html(createTable(data));
            }
        });
    }
    retriveAlldata();


    $('#addRecord').submit((event) => {
        event.preventDefault();
        let data = $('#addRecord').serialize();
        data += '&createNew=createNew';
        $.ajax({
            type: "POST",
            url: '../controller/insertOrUpdate.php',
            data: data,
            success: (data) => {
                data = JSON.parse(data);
                console.log(data);
                $('#messages').html(createMessages(data));
                console.log(data['errors'].length);
                if (data['errors'].length == 0){
                    $('#addRecord input[name=rollno]').val('');
                    $('#addRecord input[name=name]').val('');
                    $('#addRecord input[name=marks]').val('');
                }
            }
        });

    });

    $('#update').submit(event=>{
        event.preventDefault();
        let data=$('#update').serialize();
        data='updateStudent=&'+data;
        console.log(data);

        $.ajax({
            type: "POST",
            url: '../controller/insertOrUpdate.php',
            data: data,
            success: (data) => {
                data = JSON.parse(data);
                $('#modelMessages').html(createMessages(data));

            }
        });

    });

});