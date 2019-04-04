package com.example.mac.project_moneymanager;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.example.mac.project_moneymanager.data.DBManager;
import com.example.mac.project_moneymanager.data.DBManager1;
import com.example.mac.project_moneymanager.model.Customer;
import com.example.mac.project_moneymanager.model.Infomation;

import java.util.ArrayList;
import java.util.Calendar;

public class AddTransaction extends AppCompatActivity {

    private static final String TAG="AddTransaction";
    private TextView save;
    private EditText numbercost1;
    private EditText note,who;
    private TextView tv_selectdate;
    private DatePickerDialog.OnDateSetListener mDataSetListener;
    private ImageView comeback;
    private Spinner spinnerArray;
    private Spinner spinnerArray1;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.addtrans);

        comeback = (ImageView) findViewById(R.id.comeback);
        spinnerArray = (Spinner) findViewById(R.id.spinner);
        spinnerArray1 = (Spinner) findViewById(R.id.spinnerVi);
        numbercost1 = (EditText) findViewById(R.id.numbercost);
        note = (EditText) findViewById(R.id.note);
        who = (EditText) findViewById(R.id.who);
        save = (TextView) findViewById(R.id.save);

        ArrayList<String> arrayListActivity = new ArrayList<String>();
        arrayListActivity.add("Ăn uống");
        arrayListActivity.add("Mua sắm");
        arrayListActivity.add("Sinh hoạt");
        arrayListActivity.add("Giải trí");
        arrayListActivity.add("Di chuyển");
        arrayListActivity.add("Các chi phí khác");


        ArrayList<String> arrayListActivity1 = new ArrayList<String>();
        arrayListActivity1.add("Tiền mặt");
        arrayListActivity1.add("Thẻ tín dụng");

        ArrayAdapter arrayAdapter = new ArrayAdapter(this,R.layout.spinner_item,arrayListActivity);
        spinnerArray.setAdapter(arrayAdapter);

        ArrayAdapter arrayAdapter1 = new ArrayAdapter(this,R.layout.spinner_item,arrayListActivity1);
        spinnerArray1.setAdapter(arrayAdapter1);

        comeback.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(AddTransaction.this,MainActivity.class);
                startActivity(intent);
            }
        });

        tv_selectdate = (TextView) findViewById(R.id.tv_selectdate);
        tv_selectdate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Calendar cal = Calendar.getInstance();
                int year = cal.get(Calendar.YEAR);
                int month = cal.get(Calendar.MONTH);
                int day = cal.get(Calendar.DATE);

                DatePickerDialog dialog = new DatePickerDialog(
                        AddTransaction.this,
                        android.R.style.Theme_Holo_Dialog_MinWidth,
                        mDataSetListener,
                        year,month,day
                );
                dialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
                dialog.show();
            }
        });

        mDataSetListener = new DatePickerDialog.OnDateSetListener() {
            @Override
            public void onDateSet(DatePicker datePicker, int year, int month, int day) {
                Log.d(TAG,"onDateSet: dd/mm/yyy :  "+ day + "/" + month + "/" + year);
                String date = day + "/" + (month+1) + "/" + year;
                tv_selectdate.setText(date);
            }
        };
        final DBManager dbManager = new DBManager(this);
        save.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Infomation infomation = createInfomation();
                String numbercost = numbercost1.getText().toString();
                String date = tv_selectdate.getText().toString();

                if((numbercost != "0") && (date != "")){
                        dbManager.addInfomationr(infomation);
                        Intent intent = new Intent(AddTransaction.this,MainActivity.class);
                        startActivity(intent);
                }else{
                    Toast.makeText(AddTransaction.this, "nhap lai", Toast.LENGTH_SHORT).show();
                }

            }
        });

    }
    private Infomation createInfomation(){
        double numbercost;
        if(numbercost1.getText().toString() != "") {
            numbercost = Double.parseDouble(numbercost1.getText().toString());
        }else{
            numbercost = 0;
        }
        String date = tv_selectdate.getText().toString();
        String note1 = note.getText().toString();
        String who1 = who.getText().toString();
        String select = spinnerArray.getSelectedItem().toString();
        String money = spinnerArray1.getSelectedItem().toString();

        Infomation infomation = new Infomation(numbercost,select,note1,date,money,who1);
        return infomation;
    }

}