package com.example.mac.appproject_moneymanager.Adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.mac.appproject_moneymanager.R;
import com.example.mac.appproject_moneymanager.model.Infomation;

import java.util.List;

public class CustomerAdapter extends ArrayAdapter<Infomation> {

    private Context context;
    private int resource;
    private List<Infomation> infomationList;
    public CustomerAdapter(@NonNull Context context, int resource, @NonNull List<Infomation> objects) {
        super(context, resource, objects);
        this.context = context;
        this.resource = resource;
        this.infomationList = objects;
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {

        ViewHoder viewHoder;
        if(convertView==null){
            convertView = LayoutInflater.from(context).inflate(R.layout.item_listview_info,parent,false);
            viewHoder = new ViewHoder();
            viewHoder.imageicon = (ImageView) convertView.findViewById(R.id.image);
            viewHoder.textView2 = (TextView) convertView.findViewById(R.id.icon_groupname);
            viewHoder.textView3 = (TextView) convertView.findViewById(R.id.money);
            viewHoder.textView4 = (TextView) convertView.findViewById(R.id.icon_date);
            convertView.setTag(viewHoder);

        }else{
            viewHoder = (ViewHoder) convertView.getTag();
        }

        Infomation infomation = infomationList.get(position);
        String groups = infomation.getGroups();
        String select1 = "Ăn uống";
        String select2 = "Mua sắm";
        String select3 = "Sinh hoạt";
        String select4 = "Giải trí";
        String select5 = "Di chuyển";
        String select6 = "Các chi phí khác";
        if(groups.equals(select1)) {
            viewHoder.imageicon.setImageResource(R.drawable.hinhfood);
        }else if(groups.equals(select2)){
            viewHoder.imageicon.setImageResource(R.drawable.shopping);
        }else if(groups.equals(select3)){
            viewHoder.imageicon.setImageResource(R.drawable.contract);
        }else if(groups.equals(select4)){
            viewHoder.imageicon.setImageResource(R.drawable.game);
        }else if(groups.equals(select5)){
            viewHoder.imageicon.setImageResource(R.drawable.travel);
        }else if(groups.equals(select6)){
            viewHoder.imageicon.setImageResource(R.drawable.animal);
        }
         viewHoder.textView2.setText(infomation.getGroups());
         viewHoder.textView3.setText(String.valueOf(infomation.getNumbercost()));
         viewHoder.textView4.setText(infomation.getDate());
        return convertView;
    }

    public class ViewHoder{
        private ImageView imageicon;
        private TextView textView2;
        private TextView textView3;
        private TextView textView4;
    }
}
