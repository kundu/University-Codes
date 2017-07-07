import javax.script.*;

import java.util.*;
import java.util.concurrent.ThreadLocalRandom;
public class Funcions{
	public int fitness(int x) {
		try {
			ScriptEngine engine = new ScriptEngineManager()
					.getEngineByName("JavaScript");
			Map<String, Object> vars = new HashMap<String, Object>();
			vars.put("x", x);
			double result = ((double)engine.eval("15*x-Math.pow(x,2)",
					new SimpleBindings(vars)));
			return (int)result;
		} catch (Exception e) {
			System.err.println("2 "+e.toString());
		}
		return 0; 
	}
	
	public int getRandomNumber() {
		int ran = ThreadLocalRandom.current().nextInt(1, 15); 
		return ran;
	}
	
	public String getBinaryNumber(int n){
		String binary=Integer.toBinaryString(n);
		if(binary.length()<4){
			int len=binary.length();
			switch (len) {
			case 1:
				binary="000"+binary;
				break;
			case 2:
				binary="00"+binary;
				break;
			case 3:
				binary="0"+binary;
				break;
			default:
				break;
			}
		}
		return binary;
	}
}
