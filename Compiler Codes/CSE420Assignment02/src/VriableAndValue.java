public class VriableAndValue {
	Object name, equation, operator;
	int value, priority;

	public VriableAndValue(Object name, int value) {
		this.name = name;
		this.value = value;
	}

	public VriableAndValue(Object equation) {
		this.equation = equation;
	}

	public VriableAndValue(Object operator, int priority, String temp) {
		this.operator=operator;
		this.priority=priority;
	}
}
