function script()
        {
            this.initialize = function()
            {
                this.registerEvents();
            },
            
            this.registerEvents = function()
            {
                document.addEventListener('click',function(e){
                    targetElement = e.target;
                    classList = targetElement.classList;
                    if(classList.contains('deleteUser') )
                    {
                        e.preventDefault();
                        userId = targetElement.dataset.userid;
                        fname = targetElement.dataset.fname;
                        lname = targetElement.dataset.lname;
                        fullName =  fname + ' ' + lname;
                        console.log(userId, fname, lname);
                        if(window.confirm('Are you sure to delete '+ fullName + '?'))
                        {
                            $.ajax({
                                method: 'POST',
                                data: {
                                    user_id: userId,
                                    f_name: fname,
                                    l_name: lname
                                    },
                                url: 'database/delete-product.php',
                                dataType: 'json',
                                success: function(data){
                                    if(data.success)
                                    {
                                        if(window.confirm(data.message))
                                        {
                                            location.reload();
                                        }
                                        else
                                        {
                                            window.alert(data.message);
                                        }
                                    }
                                }
                            })
                        }
                        else
                        {
                            console.log('sdfvdsmnlk');
                        }
                    }
                    if(classList.contains('updateUser') )
                    {
                        e.preventDefault();
                        // Get Data
                        userId = targetElement.dataset.userid;
                        firstName = targetElement.closest('tr').querySelector('td.firstName').innerHTML;
                        lastName = targetElement.closest('tr').querySelector('td.lastName').innerHTML;
                        email = targetElement.closest('tr').querySelector('td.email').innerHTML;
                        BootstrapDialog.confirm({
                            title: 'Update' + firstName + ' ' + lastName,
                            message:
                            '<form>\
                                <div class="form-group">\
                                    <lable for="firstName">Lable Product:</lable>\
                                    <input type="firstName" class="form-control" id="firstNamel" value="'+ firstName +'"/>\
                                </div>\
                                <div class="form-group">\
                                    <lable for="lastName">Price:</lable>\
                                    <input type="lastName" class="form-control" id="lastNamel" value="'+ lastName +'"/>\
                                </div>\
                                <div class="form-group">\
                                    <lable for="email">quantity:</lable>\
                                    <input type="email" class="form-control" id="emaill" value="'+ email +'"/>\
                                </div>\
                            </form>',
                            callback: function(isUpdate)
                            {
                                if(isUpdate)//if user click ok
                                {
                                    
                                    $.ajax({
                                        method: 'POST',
                                        data: {
                                            user_Id: userId,
                                            f_name: document.getElementById('firstNamel').value,
                                            l_name: document.getElementById('lastNamel').value,
                                            email: document.getElementById('emaill').value
                                        },
                                    url: 'database/update-product.php',
                                    dataType: 'json',
                                    success: function(data)
                                    {
                                        if(data.success)
                                        {
                                            BootstrapDialog.alert({
                                                type: BootstrapDialog.TYPE_SUCCESS,
                                                message: data.message,
                                                callback: function(){location.reload();}
                                            });
                                        }
                                        else
                                        {
                                                BootstrapDialog.alert({
                                                    type: BootstrapDialog.TYPE_DANGER,
                                                    message: data.message,
                                                });
                                        
                                        }
                                    }
                                });
                                }
                            }
                            
                        });
                    }
                });
            }
        }
        var script = new script;
        script.initialize();