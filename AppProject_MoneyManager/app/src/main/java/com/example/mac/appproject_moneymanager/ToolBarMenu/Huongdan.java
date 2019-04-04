package com.example.mac.appproject_moneymanager.ToolBarMenu;

import android.content.Intent;
import android.os.Bundle;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.text.Html;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.example.mac.appproject_moneymanager.MainActivity;
import com.example.mac.appproject_moneymanager.R;


public class Huongdan extends AppCompatActivity {

    private ViewPager slideViewPager;
    private LinearLayout dotsLayout;
    private TextView[] mDots;
    private slideAdapater slideAdapater;

    private Button nextbtn;
    private Button prebtn;
    private int currentPager;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.huongdan);

        slideViewPager = (ViewPager) findViewById(R.id.slideViewPager);
        dotsLayout = (LinearLayout) findViewById(R.id.dotsLayout);

        nextbtn = (Button) findViewById(R.id.nextbtn);
        prebtn = (Button) findViewById(R.id.prebtn);

        slideAdapater = new slideAdapater(Huongdan.this);
        slideViewPager.setAdapter(slideAdapater);
        addDotsIndication(0);
        slideViewPager.addOnPageChangeListener(viewListener);

        //OnclickListeners
        nextbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                slideViewPager.setCurrentItem(currentPager + 1);
            }
        });
        prebtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                slideViewPager.setCurrentItem(currentPager - 1);
            }
        });
    }

    public void addDotsIndication(int position){
        mDots = new TextView[7];
        dotsLayout.removeAllViews();
        for(int i = 0; i <mDots.length; i++){
            mDots[i] = new TextView(this);
            mDots[i].setText(Html.fromHtml("&#8226"));
            mDots[i].setTextSize(35);
            mDots[i].setTextColor(getResources().getColor(R.color.colorPrimary));
            dotsLayout.addView(mDots[i]);

        }

        if(mDots.length > 0){
            mDots[position].setTextColor(getResources().getColor(R.color.colorPrimary));
        }
    }

    ViewPager.OnPageChangeListener viewListener = new ViewPager.OnPageChangeListener(){

        @Override
        public void onPageScrolled(int position, float positionOffset, int positionOffsetPixels) {

        }

        @Override
        public void onPageSelected(int position) {

            addDotsIndication(position);
            currentPager = position;
            if(position == 0){
                nextbtn.setEnabled(true);
                prebtn.setEnabled(false);
                prebtn.setVisibility(View.INVISIBLE);

                nextbtn.setText("Tiếp tục");
                prebtn.setText("");
            }else if(position == mDots.length - 1){
                nextbtn.setEnabled(true);
                prebtn.setEnabled(true);
                prebtn.setVisibility(View.VISIBLE);

                nextbtn.setText("Kết thúc");
                nextbtn.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        Intent intent = new Intent(Huongdan.this,MainActivity.class);
                        startActivity(intent);
                    }
                });
                prebtn.setText("Quay lại");
            }else{
                nextbtn.setEnabled(true);
                prebtn.setEnabled(true);
                prebtn.setVisibility(View.VISIBLE);

                nextbtn.setText("Tiếp tục");
                prebtn.setText("Quay lại");
            }
        }

        @Override
        public void onPageScrollStateChanged(int state) {

        }
    };
}