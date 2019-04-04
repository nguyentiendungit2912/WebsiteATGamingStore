package com.example.mac.appproject_moneymanager.InfomationUsers;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.mac.appproject_moneymanager.MainActivity;
import com.example.mac.appproject_moneymanager.R;
import com.example.mac.appproject_moneymanager.data.DBManager;

public class Login extends AppCompatActivity{
    private Button login;
    private Button newaccount;
    private EditText username,password;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

        username = (EditText) findViewById(R.id.username);
        password = (EditText) findViewById(R.id.password);
        newaccount = (Button) findViewById(R.id.bt_newacc);
        newaccount.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Login.this,NewAccount.class);
                startActivity(intent);
            }
        });
        final DBManager dbManager = new DBManager(this);
        login = (Button) findViewById(R.id.bt_login);
        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String user = username.getText().toString();
                String pass = password.getText().toString();
                if(dbManager.checkCustomer(user,pass) == true){
                    Intent intent = new Intent(Login.this,MainActivity.class);
                    startActivity(intent);
                }else{
                    Toast.makeText(Login.this, "Tai khoan hoac mat khau khong dung", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }
}
