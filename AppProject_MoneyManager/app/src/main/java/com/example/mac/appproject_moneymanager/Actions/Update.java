package com.example.mac.appproject_moneymanager.Actions;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;

import com.example.mac.appproject_moneymanager.MainActivity;
import com.example.mac.appproject_moneymanager.R;
import com.example.mac.appproject_moneymanager.data.DBManager;
import com.example.mac.appproject_moneymanager.model.Infomation;

import static com.example.mac.appproject_moneymanager.fragment.Fragment1.Text1;
import static com.example.mac.appproject_moneymanager.fragment.Fragment1.Text2;
import static com.example.mac.appproject_moneymanager.fragment.Fragment1.Text3;
import static com.example.mac.appproject_moneymanager.fragment.Fragment1.Text4;
import static com.example.mac.appproject_moneymanager.fragment.Fragment1.Text5;
import static com.example.mac.appproject_moneymanager.fragment.Fragment1.Text6;
import static com.example.mac.appproject_moneymanager.fragment.Fragment1.Text7;

public class Update extends AppCompatActivity {
    private EditText numbercost;
    private EditText giaodich;
    private EditText note;
    private EditText date;
    private EditText wallet;
    private EditText who;
    private Button save;
    private ImageView back;
    private DBManager dbManager;
    private static int ID = 0;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.update);
        Init();
        getData();
        dbManager = new DBManager(Update.this);
        save.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Infomation infomation = new Infomation();
                infomation.setmID(ID);
                if(numbercost.getText().toString().equals("")) {
                    infomation.setNumbercost(0);
                }else{
                    infomation.setNumbercost(Double.parseDouble(numbercost.getText().toString()));
                }
                infomation.setGroups(giaodich.getText().toString());
                infomation.setNote(note.getText().toString());
                infomation.setDate(date.getText().toString());
                infomation.setMoney(wallet.getText().toString());
                infomation.setHow(who.getText().toString());
                dbManager.updateInfomation(infomation);

                Intent intent = new Intent(Update.this,MainActivity.class);
                startActivity(intent);
            }
        });

        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Update.this,MainActivity.class);
                startActivity(intent);
            }
        });
    }
    public void Init(){
        numbercost = (EditText) findViewById(R.id.numbercost);
        giaodich = (EditText) findViewById(R.id.giaodich);
        note = (EditText) findViewById(R.id.note);
        date = (EditText) findViewById(R.id.date);
        wallet = (EditText) findViewById(R.id.wallet);
        who = (EditText) findViewById(R.id.who);
        save = (Button) findViewById(R.id.save);
        back = (ImageView) findViewById(R.id.comeback);
    }
    public void getData(){
        Intent intent = getIntent();
        ID = intent.getIntExtra(Text7,0);
        numbercost.setText(intent.getStringExtra(Text1));
        giaodich.setText(intent.getStringExtra(Text2));
        note.setText(intent.getStringExtra(Text3));
        date.setText(intent.getStringExtra(Text4));
        wallet.setText(intent.getStringExtra(Text5));
        who.setText(intent.getStringExtra(Text6));

    }
}
