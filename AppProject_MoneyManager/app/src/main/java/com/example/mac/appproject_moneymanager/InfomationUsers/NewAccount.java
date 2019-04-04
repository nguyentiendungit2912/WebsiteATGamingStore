package com.example.mac.appproject_moneymanager.InfomationUsers;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.mac.appproject_moneymanager.R;
import com.example.mac.appproject_moneymanager.data.DBManager;
import com.example.mac.appproject_moneymanager.model.Customer;

public class NewAccount extends AppCompatActivity{
    private Button loginback,login;
    private EditText username;
    private EditText password,repassword;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.newaccount);
        username = (EditText) findViewById(R.id.username);
        password = (EditText) findViewById(R.id.password);
        repassword = (EditText) findViewById(R.id.password1);
        login = (Button) findViewById(R.id.bt_login);
        loginback = (Button) findViewById(R.id.bt_loginback);
        loginback.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(NewAccount.this,Login.class);
                startActivity(intent);
            }
        });
        final DBManager dbManager = new DBManager(this);
        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String user1 = username.getText().toString();
                String pass1 = password.getText().toString();
                String repass1 = repassword.getText().toString();
                if(pass1.equals(repass1) && user1 != "" && pass1 != ""  && repass1 !="") {
                    Customer customer = createCustomer();
                    if (customer != null) {
                        dbManager.addAccountCustomer(customer);
                    }
                    Intent intent = new Intent(NewAccount.this, Login.class);
                    startActivity(intent);
                }else{
                    Toast.makeText(NewAccount.this, "Vui long nhap lai thong tin", Toast.LENGTH_SHORT).show();
                }
            }
        });


    }

    private Customer createCustomer(){

        String user = username.getText().toString();
        String pass = password.getText().toString();
        String repass = repassword.getText().toString();

        Customer customer = new Customer(user,pass,repass);
        return customer;
    }
}
