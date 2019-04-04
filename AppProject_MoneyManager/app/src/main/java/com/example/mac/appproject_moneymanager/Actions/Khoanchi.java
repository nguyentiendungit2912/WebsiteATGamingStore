package com.example.mac.appproject_moneymanager.Actions;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageView;

import com.example.mac.appproject_moneymanager.MainActivity;
import com.example.mac.appproject_moneymanager.R;

public class Khoanchi extends AppCompatActivity {
    private ImageView comeback;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.khoanchi);
        Init();
        comeback.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Khoanchi.this, MainActivity.class);
                startActivity(intent);
            }
        });
    }
    public void Init(){
        comeback = (ImageView) findViewById(R.id.comeback);
    }
}
