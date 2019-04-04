package com.example.mac.appproject_moneymanager.Adapter;

import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentStatePagerAdapter;

import com.example.mac.appproject_moneymanager.fragment.Fragment1;
import com.example.mac.appproject_moneymanager.fragment.Fragment2;
import com.example.mac.appproject_moneymanager.fragment.Fragment3;

public class MyAdapter extends FragmentStatePagerAdapter {

    private  String listTab[] = {"Tháng trước","Tháng này" ,"Tương lai"};
    private Fragment2 fragment1;
    private Fragment1 fragment2;
    private Fragment3 fragment0;

    public MyAdapter(FragmentManager fm) {
        super(fm);
        fragment1 = new Fragment2();
        fragment2 = new Fragment1();
        fragment0 = new Fragment3();
    }

    @Override
    public Fragment getItem(int position) {
        if(position == 0){
            return fragment1;
        }else if(position == 1){
            return fragment2;
        }else if(position == 2){
            return fragment0;
        } else{

        }
        return null;
    }

    @Override
    public int getCount() {
        return listTab.length;
    }

    @Nullable
    @Override
    public CharSequence getPageTitle(int position) {
        return listTab[position];
    }
}
