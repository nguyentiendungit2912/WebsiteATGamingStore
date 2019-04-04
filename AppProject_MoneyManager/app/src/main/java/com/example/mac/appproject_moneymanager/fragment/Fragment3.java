package com.example.mac.appproject_moneymanager.fragment;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import com.example.mac.appproject_moneymanager.Actions.Update;
import com.example.mac.appproject_moneymanager.Adapter.CustomerAdapter;
import com.example.mac.appproject_moneymanager.R;
import com.example.mac.appproject_moneymanager.data.DBManager;
import com.example.mac.appproject_moneymanager.model.Infomation;

import java.util.List;

public class Fragment3 extends Fragment {
    private View mRootView;
    private Button button;
    private ListView listView;
    private DBManager dbManager;
    private CustomerAdapter customerAdapter;
    private List<Infomation> infomationList;

    public static final String Text1 = "NUmbercost";
    public static final String Text2 = "Groups";
    public static final String Text3 = "Note";
    public static final String Text4 = "Date";
    public static final String Text5 = "MOney";
    public static final String Text6 = "How";
    public static final String Text7 = "ID";
    @Nullable
    public View onCreateView(@NonNull final LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {

        if(mRootView == null){
            mRootView = inflater.inflate(R.layout.fragment3,container,false);
        }
        button = (Button) mRootView.findViewById(R.id.button);
        listView = (ListView) mRootView.findViewById(R.id.list_item);
        dbManager = new DBManager(getActivity());
        infomationList = dbManager.getInfomationafter();
        setAdapter();


        listView.setOnItemLongClickListener(new AdapterView.OnItemLongClickListener() {
            @Override
            public boolean onItemLongClick(AdapterView<?> adapterView, View view, int position, long l) {
                Infomation infomation = infomationList.get(position);
                int result = dbManager.deleteInfomation(infomation.getmID());
                if(result > 0){
                    Toast.makeText(getActivity(), "Delete successfuly", Toast.LENGTH_SHORT).show();
                    updatelistInfo();
                }else{
                    Toast.makeText(getActivity(), "Delete fail", Toast.LENGTH_SHORT).show();
                }
                return false;
            }
        });

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Infomation infomation = infomationList.get(position);
                double numbercost = infomation.getNumbercost();
                String groups = infomation.getGroups();
                String note = infomation.getNote();
                String date = infomation.getDate();
                String Money = infomation.getMoney();
                String how = infomation.getHow();
                int ID = infomation.getmID();

                Intent intent = new Intent(getActivity(),Update.class);
                intent.putExtra(Text1,numbercost);
                intent.putExtra(Text2,groups);
                intent.putExtra(Text3,note);
                intent.putExtra(Text4,date);
                intent.putExtra(Text5,Money);
                intent.putExtra(Text6,how);
                intent.putExtra(Text7,ID);
                startActivityForResult(intent,1998);
            }
        });
        return mRootView;
    }
    public void setAdapter(){
        if(customerAdapter==null){
            customerAdapter = new CustomerAdapter(getActivity(),R.layout.item_listview_info,infomationList);

        }
        listView.setAdapter(customerAdapter);
    }
    public void updatelistInfo(){
        infomationList.clear();
        infomationList.addAll(dbManager.getInfomationafter());
        if(customerAdapter != null) {
            customerAdapter.notifyDataSetChanged();
        }
    }


}
