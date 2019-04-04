package com.example.mac.project_moneymanager;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ListView;

import com.example.mac.project_moneymanager.Adapter.CustomerAdapter;
import com.example.mac.project_moneymanager.data.DBManager;
import com.example.mac.project_moneymanager.model.Infomation;

import java.util.List;

public class Fragment3 extends Fragment{
    private View mRootView;
    private ListView listView;
    private DBManager dbManager;
    private CustomerAdapter customerAdapter;
    private List<Infomation> infomationList;
    @Nullable
    public View onCreateView(@NonNull final LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {

        if(mRootView == null){
            mRootView = inflater.inflate(R.layout.fragment3,container,false);
        }
        listView = (ListView) mRootView.findViewById(R.id.list_item);
        return mRootView;
    }
}
