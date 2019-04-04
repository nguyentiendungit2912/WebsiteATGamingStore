package com.example.mac.appproject_moneymanager.fragment;

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

import com.example.mac.appproject_moneymanager.Adapter.CustomerAdapter;
import com.example.mac.appproject_moneymanager.R;
import com.example.mac.appproject_moneymanager.data.DBManager;
import com.example.mac.appproject_moneymanager.model.Infomation;

import java.util.List;

public class Fragment2 extends Fragment {
    private View mRootView;
    private Button button;
    private ListView listView;
    private DBManager dbManager;
    private CustomerAdapter customerAdapter;
    private List<Infomation> infomationList;

    @Nullable
    public View onCreateView(@NonNull final LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {

        if(mRootView == null){
            mRootView = inflater.inflate(R.layout.fragment2,container,false);
        }
        button = (Button) mRootView.findViewById(R.id.button);
        listView = (ListView) mRootView.findViewById(R.id.list_item);
        dbManager = new DBManager(getActivity());
        infomationList = dbManager.getInfomationbefore();
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
        infomationList.addAll(dbManager.getInfomationbefore());
        if(customerAdapter != null) {
            customerAdapter.notifyDataSetChanged();
        }
    }


}
